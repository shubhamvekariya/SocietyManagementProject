<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VirtualSession;
use Illuminate\Support\Facades\Auth;
use OpenTok\OpenTok;
use OpenTok\MediaMode;
use OpenTok\Role;

class SessionsController extends Controller
{
    /** Creates a new virtual class for teachers
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

     public function sessions(){
        $user = Auth::user();
        if ($user->hasRole('secretary', 'society')) {
            $id = $user->id;
        } else {
            $id = $user->apartment->society_id;
        }
        $sessions = VirtualSession::where('society_id', Auth::user()->id)->get();
        return view('sessions.all_sessions', compact('sessions'));
     }

    public function createSession(Request $request)
    {
        $user = Auth::user();
        if($user->hasRole('secretary', 'society')){
            $opentok = new OpenTok(env('TOKBOX_API_KEY'), env('TOKBOX_API_SECRET'));
            $session = $opentok->createSession(array('mediaMode' => MediaMode::ROUTED));
            $session = VirtualSession::create([
                'name' => $user->society_name . "'s " . $request->input("name") . " class",
                'session_id' => $session->getSessionId(),
                'society_id' => $user->id
            ]);
            return redirect()->back()->with('success', 'Session added successfully');
        }
        else {
            return redirect()->back()->with('error', 'unauthorized user');
        }
    }

    public function showSessionRoom(Request $request, $id)
    {
        $virtualClass = VirtualSession::findOrFail($id);
        $sessionId = $virtualClass->session_id;
        $opentok = new OpenTok(env('TOKBOX_API_KEY'), env('TOKBOX_API_SECRET'));
        $token = $opentok->generateToken($sessionId, ['role' => Role::PUBLISHER, 'expireTime' => time() + (7 * 24 * 60 * 60)]);
        return view('sessions.classroom', compact('token', 'sessionId'));
    }
}
