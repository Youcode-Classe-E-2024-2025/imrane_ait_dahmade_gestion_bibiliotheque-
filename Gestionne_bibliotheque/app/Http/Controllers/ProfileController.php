<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    // Afficher le profil de l'utilisateur connecté
    public function show()
    {
        return view('profile.show', ['user' => Auth::user()]);
    }

    // Afficher le formulaire d'édition du profil
    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    // Mettre à jour les informations du profil
    public function update(Request $request)
    {
        // Valider les données du profil
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|confirmed|min:8', // On ne demande pas un mot de passe si l'utilisateur ne veut pas changer
        ]);

        // Mettre à jour les données
        $user = Auth::user();
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        // Si un mot de passe est fourni, on le hash et on le met à jour
        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profil mis à jour avec succès.');
    }
}
