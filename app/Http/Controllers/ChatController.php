<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');

    }

    public function chat()
    {
        return view('chat');
    }

    public function send(Request $request)
    {
        //return $request->all();
        $user= User::find(Auth::id());
       broadcast(new ChatEvent($request->message, $user));
    }

   /* public function send()
    {
        $message= 'Hello';
       $user= User::find(Auth::id());
     broadcast(new ChatEvent($message, $user));

    }*/
}
