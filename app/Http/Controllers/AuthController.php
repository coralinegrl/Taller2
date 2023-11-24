<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class AuthController extends Controller
{
    public function login(Request $request) {
        try {
        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            $rut = $user->rut; // Obtener el rut del usuario desde la base de datos

            $isAdmin = $user->is_admin; // Obtener el valor de is_admin desde la base de datos
            
            return response()->json(['token' => $token, 'rut' => $rut,'is_admin' => $isAdmin], 200);
        }

        return response()->json(['error' => 'Unauthorized hola'], 401);

    } catch (\Throwable $th) {
        //dd($th->getMessage());
        return response()->json(['error' => $th->getMessage()]);
    }
    }

    //public function logout(Request $request) {

        //$request->user()->currentAccessToken()->delete();

        //return response()->json(['message' => 'Successfully logged out']);
    //}
}
