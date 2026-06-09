<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required',
            'message' => 'required'
        ]);
        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
            'annonce_id' => $request->annonce_id,
               ]);
               return back()->with('message', 'Message envoyé');
    }


      public function inbox(){
        $messages= Message::where("receiver_id",Auth::id())->get();
        return view('message.inbox', compact('messages'));
    }

    /**
     * Display the specified resource.
     */
   public function show(User $user)
   {
    $messages = Message::where(function ($q) use ($user) {
        $q->where('sender_id', Auth::id())
          ->where('receiver_id', $user->id);
    })->orWhere(function ($q) use ($user) {
        $q->where('sender_id', $user->id)
          ->where('receiver_id', Auth::id());
    })->get();

    return view('message.show', compact('messages', 'user'));
   }
   public function sent()
{
    $messages = Message::where('sender_id', Auth::id())
        ->with('receiver')
        ->get();

    return view('message.sent', compact('messages'));
}
    /**
     * Show the form for editing the specified resource.
     */
 
  
}
