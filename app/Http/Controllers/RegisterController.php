<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /**
     * Muestra el formulario de registro.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Maneja la solicitud de registro de un nuevo usuario.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'position' => ['required', 'integer', 'exists:positions,id'],
            'environment' => ['required', 'integer', 'exists:entornos,id'],
            'subnet' => ['required', 'integer', 'exists:subnets,id']
        ]);
        
        if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        try {
            $user = new User();
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->position_id = $request->position;
            $user->environment_id = $request->environment;
            $user->subnet_id = $request->subnet;
            $user->is_active = 0;
            
        } catch (\Exception $e) {
            dd('Error al guardar el usuario: ' . $e->getMessage());
        }
        
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('index');
    }
}