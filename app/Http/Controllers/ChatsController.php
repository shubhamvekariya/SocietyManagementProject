<?php

namespace App\Http\Controllers;

use App\Events\DiscussionEvent;
use App\Models\Discussion;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    //
    public function __construct()
    {
    }

    public function index(Discussion $discussion)
    {
        return view('discussion.discussion_chats', compact('discussion'));
    }
    public function fetchMessages(Discussion $discussion)
    {
        return Message::where('discussion_id', $discussion->id)->with('user')->get();
    }

    public function sendMessage(Request $request, Discussion $discussion)
    {
        $message = Message::create([
            'message' => $request->message,
            'discussion_id' => $discussion->id,
            'user_id' => Auth::user()->id
        ]);

        broadcast(new DiscussionEvent($message->load('user'), $discussion))->toOthers();
        return ['status' => 'success'];
    }
}
