<?php
namespace App\Http\Controllers;

use App\Models\Base;
use App\Models\Entorno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class BaseController extends Controller
{
    public function show()
    {
        // Consulta todos los registros de la tabla 'bases'
        $bases = Base::with('entorno')->get();

        // Pasa los datos de bases y la información del usuario a la vista 'bases'
        return view('adm/bases', ['bases' => $bases]);
    }

    public function store(Request $request)
    {        
        // Valida los datos recibidos del formulario
        $validatedData = $request->validate([
            'environment' => 'required|exists:entornos,id',
            'baseName' => 'required|string|max:255',
            'timeHeader' => 'required|numeric',
            'timeUserSeg' => 'required|numeric',
        ]);

        // Crea un nuevo registro en la tabla bases
        Base::create([
            'entorno_id' => $request->input('environment'),
            'nombrebase' => $request->baseName,
            'tiempoencabezado' => $request->timeHeader,
            'tiempoindseg' => $request->timeUserSeg,
        ]);
        
        return redirect()->route('adm.bases')->with('success', 'Base agregada exitosamente');
    }

    public function destroy(Base $base){
        $base->delete();
        return back();
    }
}