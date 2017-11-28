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

   /* public function send(Request $request)
    {
        $user= User::find(Auth::id());
       event(new ChatEvent($request->message, $user));
    }*/

    public function send()
    {
        $message= 'Hello';
       $user= User::find(Auth::id());
       $wr= broadcast(new ChatEvent($message, $user));
       dd($wr);
    }
}
