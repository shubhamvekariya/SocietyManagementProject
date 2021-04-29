<?php

use App\Models\User;
use App\Models\Discussion;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
$discussion = Discussion::all();
foreach ($discussion as $dis) {
    Broadcast::channel('chat' . $dis->id, function ($user) {
        return $user;
    });
}
Broadcast::channel('user.{userId}', function ($user, $userId) {
    $user = User::find($userId);
    return $user->id == $user->user_id;
});
