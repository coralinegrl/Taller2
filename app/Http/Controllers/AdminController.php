<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Asegúrate de usar tu modelo de Usuario
use Illuminate\Support\Facades\Hash; // Para encriptar contraseñas

class AdminController extends Controller
{
    public function listUsers() {
        // Asegúrate de implementar la lógica para verificar que solo el admin pueda acceder
        $users = User::where('is_admin', false)->get();
        return response()->json($users);
    }

    public function createUser(Request $request) {
        // Validación de los datos de entrada
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'rut' => 'required|string|max:9|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'points' => 'required|integer|min:0',
            'password' => 'required|string|min:1', // Asegúrate de validar adecuadamente la contraseña
        ]);

        // Encriptación de la contraseña
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Creación del usuario
        $user = User::create($validatedData);
        return response()->json($user, 201);
    }

    public function deleteUser(Request $request, $id) {
        // Buscar el usuario por ID
        $user = User::find($id);

        // Validar si el usuario existe
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Verificar la doble confirmación
        $confirmation = $request->input('confirmation');

        // Validar si la confirmación es "SI"
        if ($confirmation === "SI") {
            // Eliminar el usuario
            $user->delete();

            return response()->json(['message' => 'User deleted']);
        } else {
            return response()->json(['message' => 'User not deleted']);
        }
    }

}
