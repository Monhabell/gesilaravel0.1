<?php

namespace App\Http\Controllers;

use App\Models\Productivity;
use App\Models\Base;
use App\Models\Packages;
use App\Models\Assignments;
use App\Models\Receptions;
use App\Models\DataUsers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;


class ProductividadController extends Controller
{

    // consulta de paquetes

    public function paquetes(Request $request)
    {
        $id = $request->id;

        // Obtener los paquetes asociados al ID de digitador
        $dataPaquetes = Assignments::where('digitizer_id', $id)->get();

        $resultados = [];

        // Iterar sobre los paquetes y obtener sus nombres y fichas asociadas
        foreach ($dataPaquetes as $paquete) {
            $paquete_id = $paquete->package_id;
            // Buscar el nombre del paquete en la tabla de paquetes
            $paqueteNombre = Packages::where('id', $paquete_id)->value('num_package');

            // Obtener las fichas asociadas al paquete
            $fichas_paquetes = Receptions::where('package_id', $paquete_id)->get();

            $fichasArray = [];

            foreach ($fichas_paquetes as $fichas) {
                // Obtener formato y tiempos por cada No de registro 
                $base_id = $fichas->format_id;
                $id_reg = $fichas->id;

                $base_info = Base::where('id', $base_id)->first();
                // Buscar en la tabla de productividad
                $productividad = Productivity::where('file_id', $id_reg)->get();

                $info_user = []; // Inicialización de la variable

                foreach ($productividad as $idDig) {

                    $slect_dig = DataUsers::where('id_user', $idDig->dig_id)->first(); // Ajuste aquí según la estructura de tu base de datos
                    if ($slect_dig) { // Verificar si se encontró el usuario
                        $info_user[] = $slect_dig->url_img;
                    }
                }

                // Agregar la información de la base y la productividad al array de fichas
                $fichasArray[] = [
                    'ficha' => $fichas,
                    'base' => $base_info,
                    'productividad' => $productividad,
                    'img' => $info_user
                ];
            }


            // Guardar el nombre del paquete y las fichas asociadas en un array
            $resultados[] = [
                'paquete' => $paqueteNombre,
                'fichas' => $fichasArray
            ];
        }

        // Devolver los nombres de los paquetes y las fichas asociadas como una respuesta JSON
        return response()->json([
            'resultados' => $resultados,
        ]);
    }
}
