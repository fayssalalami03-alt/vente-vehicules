<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   public function profile()
{
    $user = Auth::user();

    $annonces = Annonce::with('images')
        ->where('user_id', $user->id)
        ->get();

    return view('home', [
        'annonces' => $annonces,
        'annoncesCount' => $annonces->count(),
        
    ]);
}
}
