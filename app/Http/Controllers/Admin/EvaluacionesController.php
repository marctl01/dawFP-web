<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evaluacion;
use App\Models\Uf;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EvaluacionesController extends Controller
{
    public function index()
    {
        $evaluaciones = Evaluacion::paginate(10);
        $ufs = Uf::all();
        $users = User::whereHas('rol', function ($query) {
            $query->where('name', 'alumno');
        })->get();
        
        return view('teacher.evaluaciones' , compact('evaluaciones','ufs' , 'users'));
    }

    public function destroy(Request $request)
    {   
        $id = $request->input('id');

        $response = Http::delete('https://focused-wozniak.82-223-161-36.plesk.page/api/evaluaciones/' . $id);
    
        if ($response->successful()) {
            return back()->with('success', 'Evaluacion eliminar con éxito');
        } else {
            return back()->with('error', 'Error al crear la Evaluacion');
        }
    }

    public function store(Request $request)
    {   
        $nota = $request->input('nota');
        $id_user = $request->input('id_usuario');
        $id_uf = $request->input('id_uf');
        
        $uf = Uf::find($id_uf);
        $id_modulo = $uf->modulo->id;

        // Consultar la existencia del campo con el mismo nombre
        $existingEvaluaciones = Http::get('https://focused-wozniak.82-223-161-36.plesk.page/api/evaluaciones');

        if ($existingEvaluaciones->successful()) {
            $existingEvaluaciones = $existingEvaluaciones->json();
        
            // Verificar si el usuario ya tiene una nota en la UF
            $existingEvaluation = collect($existingEvaluaciones)->first(function ($evaluacion) use ($id_uf, $id_user) {
                return $evaluacion['unidadf_id'] == $id_uf && $evaluacion['user_id'] == $id_user;
            });
        
            if ($existingEvaluation) {
                return back()->with('error', 'El usuario ya tiene una nota en esta UF');
            }
        } else {
            return back()->with('error', 'Error al consultar las evaluaciones');
        }
        
        


        $response = Http::post('https://focused-wozniak.82-223-161-36.plesk.page/api/evaluaciones', [
            'user_id' => $id_user,
            'modulo_id' => $id_modulo,
            'unidadf_id' => $id_uf,
            'nota' => $nota
        ]);

        if ($response->successful()) {
            return back()->with('success', 'Evaluacion creada con éxito');
        } else {
            return back()->with('error', 'Error al crear la Evaluacion');
        }
    }
}
