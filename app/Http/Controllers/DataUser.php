<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File; // Agrega esta línea
use App\Models\DataUsers;




class DataUser extends Controller
{

    public function Seve(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'document' => 'required|numeric',
            'birthdate' => 'required|date',
            'phone' => 'required|numeric',
            'address' => 'required',
            'sex' => 'required',
            'rh' => 'required',
            'contract' => 'required',
            'eps' => 'required',
            'afp' => 'required',
            'arl' => 'required',
            'ethnicity' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Subir y almacenar la imagen
        if ($request->hasFile('foto')) {
            $imagen = $request->file('foto');
            $nombreImagen = $imagen->getClientOriginalName();
            $ruta = $imagen->storeAs('public/img/img_perfil', $nombreImagen);

            // Ahora, mueve la imagen al directorio público
            // Primero, obtén la ruta de almacenamiento temporal
            $rutaTemporal = storage_path('app/' . $ruta);

            // Luego, mueve la imagen al directorio público deseado
            $rutaPublica = public_path('img/img_perfil/' . $nombreImagen);
            File::move($rutaTemporal, $rutaPublica);
        }

        // Crear una nueva instancia del modelo Usuario y asignar los valores del formulario
        try {
            $usuario = new DataUsers();
            $usuario->id_user = $request->id_user;
            $usuario->url_img = $nombreImagen;
            $usuario->document = $request->document;
            $usuario->birthdate = $request->birthdate;
            $usuario->phone = $request->phone;
            $usuario->address = $request->address;
            $usuario->sex = $request->sex;
            $usuario->rh = $request->rh;
            $usuario->contract = $request->contract;
            $usuario->eps = $request->eps;
            $usuario->afp = $request->afp;
            $usuario->arl = $request->arl;
            $usuario->ethnicity = $request->ethnicity;

            // Guardar el usuario en la base de datos
            $usuario->save();
        } catch (\Exception $e) {
            dd('Error al guardar el usuario: ' . $e->getMessage());
        }

        return back();
    }
}
