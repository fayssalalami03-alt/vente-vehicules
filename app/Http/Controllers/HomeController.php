<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Category;
use App\Models\User;

class HomeController extends Controller
{
    public function home()
    {
        return view('home',[
        'annoncesCount' =>Annonce::count(),
        'usersCount' => User::count(),
        'categoriesCount' => Category::count(),
        'latestAnnonces' => Annonce::with('images')->latest()->take(6)->get(),

        ]);
    }
}
