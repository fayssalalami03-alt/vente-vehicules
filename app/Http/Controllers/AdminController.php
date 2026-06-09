<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Category;
use App\Models\Message;
use App\Models\User;

class AdminController extends Controller
{
public function dashboard()
{
    $usersCount = User::count();
    $annoncesCount = Annonce::count();
    $categoriesCount = Category::count();
    $messagesCount = Message::count();

    $latestAnnonces = Annonce::with('user')
        ->get();

    return view('admin.dashboard', compact(
        'usersCount',
        'annoncesCount',
        'categoriesCount',
        'messagesCount',
        'latestAnnonces'
    ));
}
}
