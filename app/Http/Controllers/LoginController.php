<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Vinkla\Hashids\Facades\Hashids;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validar los datos del formulario de inicio de sesión
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $remember = ($request->has("remember") ? true : false);
        // Intentar autenticar al usuario
        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            if ($user->is_active) {
                $user_id = Hashids::encode($user->id);
                $request->session()->regenerate();
                switch ($user->subnet_id){
                    case "1":
                        switch ($user->environment_id){
                            case 1 :
                                if($user->position_id === 6){//Digitador
                                    return redirect()->intended("/dig/digitizer/$user_id");
                                }else {//Admin
                                    return redirect()->route('adm.home');
                                }
                                break;
                                
                            case 'laboral':
                                return redirect()->intended("/adm/home/$user_id");
                        }

                }
                
            }else{
                return redirect()->back()->withErrors(['message' => 'Usuario inactivo.']);
            }
        }
        // Si la autenticación falla, redireccionar de nuevo al formulario de inicio de sesión con un mensaje de error
        return redirect()->back()->withErrors(['message' => 'Credenciales inválidas. Por favor, intente de nuevo.']);
    }
}