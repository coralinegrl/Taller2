<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::where('is_admin', false)->get(['name', 'surname', 'rut', 'email', 'points']);
        return response()->json($users);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'rut' => 'required|string|max:9|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'points' => 'required|integer|min:0',
        ]);

        $user = User::create($validatedData);
        return response()->json($user, 201);
    }

    public function show($id) {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        return response()->json($user);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'rut' => 'required|string|max:9|unique:users,identification_number,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'points' => 'required|integer|min:0',
        ]);

        $user->update($validatedData);
        return response()->json($user);
    }

    public function destroy($id) {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete();
        return response()->json(['message' => 'User deleted']);
    }
}

