<?php

namespace App\Http\Controllers;

use App\Events\DiscussionEvent;
use App\Events\WebSocketDemoEvent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    //
    public function __construct()
    {

    }

    public function index()
    {
        return view('chats');
    }
    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'message' => $request->message,
            'discussion_id' => 1,
            'user_id' => Auth::user()->id
        ]);

        broadcast(new DiscussionEvent($message->load('user')))->toOthers();
        return ['status' => 'success'];
    }
}
