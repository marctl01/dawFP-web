<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ModulosController extends Controller
{
    public function index()
    {
        $modulos = Modulo::paginate(10);
        return view('teacher.modulos' , compact('modulos'));
    }
    public function destroy(Request $request)
    {   
        $id = $request->input('id');

        $response = Http::delete('https://focused-wozniak.82-223-161-36.plesk.page/api/modulos/' . $id);
    
        if ($response->successful()) {
            return back()->with('success', 'Módulo eliminado con éxito');
        } else {
            return back()->with('error', 'Error al eliminar el módulo');
        }
    }

    public function store(Request $request)
    {   
        $moduloname = $request->input('moduloname');

        // Consultar la existencia del campo con el mismo nombre
        $existingModulos = Http::get('https://focused-wozniak.82-223-161-36.plesk.page/api/modulos');

        if ($existingModulos->successful()) {
            $existingModulos = $existingModulos->json();

            // Verificar si ya existe un campo con el mismo nombre
            $existingField = collect($existingModulos)->first(function ($modulo) use ($moduloname) {
                return strtolower($modulo['name']) === strtolower($moduloname);
            });

            if ($existingField) {
                return back()->with('error', 'Ya existe un campo con el mismo nombre');
            }
        } else {
            return back()->with('error', 'Error al consultar los campos');
        }

        $response = Http::post('https://focused-wozniak.82-223-161-36.plesk.page/api/modulos', [
            'name' => $moduloname
        ]);

        if ($response->successful()) {
            return back()->with('success', 'Modulo creado con éxito');
        } else {
            return back()->with('error', 'Error al eliminar el Modulo');
        }
    }
}
