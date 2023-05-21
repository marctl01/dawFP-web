<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        $rols = Rol::all();
        return view('teacher.user' , compact('users','rols'));
    }
    public function destroy(Request $request)
    {   
        $id = $request->input('id');

        $response = Http::delete('https://focused-wozniak.82-223-161-36.plesk.page/api/users/' . $id);
    
        if ($response->successful()) {
            return back()->with('success', 'Módulo eliminado con éxito');
        } else {
            return back()->with('error', 'Error al eliminar el módulo');
        }
    }

    public function store(Request $request)
    {   
        $username = $request->input('username');
        $email = $request->input('email');
        $pass = $request->input('passw');
        $pass_h = Hash::make($pass);
        $rol = $request->input('rol');

        // Consultar la existencia del campo con el mismo nombre
        $existingUser = Http::get('https://focused-wozniak.82-223-161-36.plesk.page/api/users');

        if ($existingUser->successful()) {
            $existingUser = $existingUser->json();

            // Verificar si ya existe un campo con el mismo correo
            $existingField = collect($existingUser)->first(function ($user) use ($email) {
                return strtolower($user['email']) === strtolower($email);
            });

            if ($existingField) {
                return back()->with('error', 'Ya existe un campo con el mismo nombre');
            }
        } else {
            return back()->with('error', 'Error al consultar los campos');
        }

        $response = Http::post('https://focused-wozniak.82-223-161-36.plesk.page/api/users', [
            'name' => $username,
            'email' => $email,
            'password' => $pass_h,
            'rol_id' => $rol
        ]);

        if ($response->successful()) {
            return back()->with('success', 'Usuario creado con éxito');
        } else {
            return back()->with('error', 'Error al eliminar el Usuario');
        }
    }

    public function update(Request $request)
    {   
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $rol_id = $request->input('rol_id');
        
        $url = 'https://focused-wozniak.82-223-161-36.plesk.page/api/users/'.$id;


        $response = Http::put('https://focused-wozniak.82-223-161-36.plesk.page/api/users/'.$id, [
            'name' => $name,
            'email' => $email,
            'rol_id' => $rol_id
        ]);

        if ($response->successful()) {
            return ['success', 'Usuario actualizado con éxito'];
        } else {
            return ['error', 'Error al actualizar el Usuario'];
        }
    }
}
