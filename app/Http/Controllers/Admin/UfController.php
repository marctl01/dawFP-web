<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modulo;
use App\Models\Uf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UfController extends Controller
{
    public function index()
    {
        $modulos = Modulo::all();
        $ufs = Uf::paginate(10);
        return view('teacher.uf' , compact('modulos', 'ufs'));
    }

    public function destroy(Request $request)
    {   
        $id = $request->input('id');

        $response = Http::delete('https://focused-wozniak.82-223-161-36.plesk.page/api/ufs/' . $id);
    
        if ($response->successful()) {
            return back()->with('success', 'Unidad Formativa eliminar con éxito');
        } else {
            return back()->with('error', 'Error al crear la Unidad Formativa');
        }
    }

    public function store(Request $request)
    {   
        $ufname = $request->input('ufname');
        $id_modulo = $request->input('id_modulo');

        // Consultar la existencia del campo con el mismo nombre
        $existingUfs = Http::get('https://focused-wozniak.82-223-161-36.plesk.page/api/ufs');

        if ($existingUfs->successful()) {
            $existingUfs = $existingUfs->json();

            // Verificar si ya existe un campo con el mismo nombre
            $existingField = collect($existingUfs)->first(function ($uf) use ($ufname) {
                return strtolower($uf['name']) === strtolower($ufname);
            });

            if ($existingField) {
                return back()->with('error', 'Ya existe un campo con el mismo nombre');
            }
        } else {
            return back()->with('error', 'Error al consultar los campos');
        }

        $response = Http::post('https://focused-wozniak.82-223-161-36.plesk.page/api/ufs', [
            'name' => $ufname,
            'modulo_id' => $id_modulo
        ]);

        if ($response->successful()) {
            return back()->with('success', 'Unidad Formativa creada con éxito');
        } else {
            return back()->with('error', 'Error al eliminar la Unidad Formativa');
        }
    }
}
