<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;



class AuthController extends Controller
{
    public function login(Request $request)
    {
        // try {
        //     $user = User::where('username', $request->username)->first();

        //     if ($user && Hash::check($request->password, $user->password)) {
        //         $token = $user->createToken('Personal Access Token')->plainTextToken;
        //         $rut = $user->rut; // Obtener el rut del usuario desde la base de datos

        //         $isAdmin = $user->is_admin; // Obtener el valor de is_admin desde la base de datos

        //         return response()->json(['token' => $token, 'rut' => $rut, 'is_admin' => $isAdmin], 200);
        //     }

        //     return response()->json(['error' => 'Unauthorized'], 401);
        // } catch (\Throwable $th) {
        //     // dd($th->getMessage());
        //     return response()->json(['error' => $th->getMessage()]);
        // }

        $credentials = $request->only('username', 'password');
        try {
            // Intentar autenticar al usuario con las credenciales recibidas.
            if (!$tokenCheck = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'message' => 'las credenciales ingresadas son incorrectas.',
                ], 400);
            }
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'token no creado',
            ], 500);
        }

        // Obtenemos al usuario autenticado
        $user = auth()->user();

        return response()->json([
            'token' => $tokenCheck,
            'rut' => $user->rut,
            'is_admin' => $user->is_admin,
        ]);
    }

    public function index()
    {
        return response()->json([
            'message' => 'Bienvenido a la API de la aplicación de puntos.',
        ]);
    }
}
