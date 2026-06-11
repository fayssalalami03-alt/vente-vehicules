<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'prenom' => 'required',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required',
        'password' => 'required|min:6',
      ], [
        'name.required' => 'Le nom est obligatoire',
        'prenom.required' => 'Le prénom est obligatoire',
        'email.required' => 'L’email est obligatoire',
        'email.email' => 'Format email invalide',
        'email.unique' => 'Cet email est déjà utilisé',
        'phone.required' => 'Le téléphone est obligatoire',
        'password.required' => 'Le mot de passe est obligatoire',
        'password.min' => 'Le mot de passe doit contenir au moins 6 caractères',
      ]);
        $user = User::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]
        );

        Auth::login($user);

        return redirect()->route('home');
    }
}