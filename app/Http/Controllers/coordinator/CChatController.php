<?php

namespace App\Http\Controllers\coordinator;

use App\Models\User;
use App\Models\Chat_message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CChatController extends Controller
{
    public function chat()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        $messages = Chat_message::where('sender', Auth::id())->with('getsender', 'getreceiver')->get();
        return view('coordinator.chat.chat', ['users' => $users]);
    }

    public function getmessages(Request $request)
    {
        $messages = Chat_message::where('sender', Auth::id())->where('receiver', $request->receiver_id)->get();
        $user = User::where('id', $request->receiver_id)->firstOrFail();
        return view('coordinator.chat.messages', ['messages' => $messages, 'user' => $user]);
    }

    public function getallmessages(Request $request)
    {
        $messages = Chat_message::where('sender', Auth::id())->where('receiver', $request->receiver_id)->get();
        $user = User::where('id', $request->receiver_id)->firstOrFail();
        return view('coordinator.chat.getmessages', ['messages' => $messages, 'user' => $user]);
    }

    public function getmessage(Request $request)
    {
        $messages = Chat_message::where('sender', Auth::id())->where('receiver', $request->receiver_id)->get();
        $user = User::where('id', $request->receiver_id)->firstOrFail();
        return view('coordinator.chat.message', ['messages' => $messages, 'user' => $user]);
    }

    public function sendmessage(Request $request)
    {
        $message = new Chat_message(['sender' => Auth::id(), 'receiver' => $request->receiver_id, 'condition' => "0", 'content' => $request->content]);
        $message->save();

        //$messages = Message::where('sender', Auth::id())->where('receiver', $request->receiver_id)->get();

        //$user = User::where('id', $request->receiver_id)->firstOrFail();
        //return view('coordinator.chat.messages', ['messages' => $messages, 'user' => $user]);
        $get_message = Chat_message::where('id', $message->id)->firstOrFail();
        return view('coordinator.chat.message', ['message' => $get_message]);
    }
}
