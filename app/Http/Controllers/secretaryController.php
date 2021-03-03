<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class secretaryController extends Controller
{
    //
    public function approve($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->approved_at = now();
        $user->save();
        return redirect()->back()->withMessage('User approved successfully');
    }
}
