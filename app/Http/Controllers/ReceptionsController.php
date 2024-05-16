<?php
namespace App\Http\Controllers;

use App\Models\Base;
use App\Models\Receptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Entorno;

class ReceptionsController extends Controller
{
    public function show($requestEnvironment)
    {   
        $selected_environment = strtolower($requestEnvironment);
        $environment = Entorno::where('entorno', $selected_environment)->first();
        $environment_id = $environment->id;

        $receptions = Receptions::with(['user', 'bases'])
                        ->where('environment', $environment_id)
                        ->whereNull('received_by')->get();
        $receptions_quantity = $receptions->count();

        $bases = Base::where('entorno_id', $environment_id)->get();
        
        return view('adm/receptions', [
            'environment' => $selected_environment,
            'receptions' => $receptions,
            'receptions_quantity' => $receptions_quantity,
            'bases' => $bases]);
    }

    public function update(Request $request, Receptions $reception){
        
        $reception->update([
            'file_number' => $request->file_number,
            'format_id' => $request->format_id,
            'quantity' => $request->quantity
        ]);
        
        return back();
    }

    public function receive(Request $request)
    {
        // Obtén los valores de los checkboxes seleccionados
        $checkboxes = $request->input('receptionsFiles', []);        
        if (!empty($checkboxes)) {
            $user = Auth::user();
            Receptions::whereIn('id', $checkboxes)
                ->update(['received_by' => $user->id]);

            // Puedes redirigir a una página de éxito o retornar un mensaje
            return redirect()->back()->with('success', 'Se recibieron ' . count($checkboxes) . ' fichas correctamente');
        } else {
            return redirect()->back()->with('error', 'Por favor seleccione al menos una ficha para recibir');
        }
    }
}