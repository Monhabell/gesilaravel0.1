<?php
namespace App\Http\Controllers;

use App\Models\Entorno;
use App\Models\Productivity;

use Illuminate\Http\Request;

class ProductivityControllerAdm extends Controller
{
    public function productivityAdm()
    {
        // Consulta todos los registros de la tabla 'bases'
        $productivity = Productivity::all();
        $environments = Entorno::all();

        // Obtiene el usuario autenticado
        $user = auth()->user();

        // Pasa los datos de bases y la información del usuario a la vista 'bases'
        return view('adm/productivity', [
            'productivity' => $productivity, 
            'user' => $user,
            'environments' => $environments]);
    }
}