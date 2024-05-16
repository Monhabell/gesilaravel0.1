<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Validation\Rule;

use App\Models\User;
use App\Models\Base;
use App\Models\Entorno;
use App\Models\Subnets;
use App\Models\DataUsers;
use App\Models\Positions;


class ProfileController extends Controller
{
    public function showDigitizer($id)
    {
        // Decodificar el user_id
        $decoded_user_id = Hashids::decode($id);

        // Verificar si el user_id se pudo decodificar correctamente
        if (empty($decoded_user_id)) {
            return redirect()->back()->withErrors(['message' => 'ID de usuario inválido.']);
        }

        // Obtener el user_id decodificado
        $user_id = $decoded_user_id[0];

        // Realizar consultas con el user_id
        $user = User::findOrFail($user_id);

        $positions_name = Positions::where('id', $user->position_id)->get();

        // consulta de datos Tabla Data_user
        $data_user = DataUsers::where('id_user', $user_id)->first();
        $entornos = Entorno::all();

        $totalHorasTrabajo = 0;



        // Verificar si hay datos en data_user y el entono sea igual a Gesi = 1
        if (!$data_user and $user->environment_id == '1') {
            // Si no hay datos, establecer una variable para mostrar el modal
            $mostrarModal = true;
            $userData = "";
        } else {
            // Si hay datos, no mostrar el modal
            $mostrarModal = false;
            $userData = $data_user;
        }

        // Pasar el usuario y otros datos a la vista
        return view('/dig/digitizer', [
            'user' => $user,
            'data_user' => $userData,
            'entorno' => $entornos,
            'totalHorasTrabajo' => $totalHorasTrabajo,
            'mostrarModal' => $mostrarModal, // Pasar la variable al Blade
            'positions' => $positions_name,
        ]);
    }


    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }


    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function obtenerBases($entorno_id)
    {
        $bases = Base::where('entorno_id', $entorno_id)->get(); // Obtener las bases asociadas al entorno
        return response()->json($bases); // Devolver las bases como una respuesta JSON
    }

}
