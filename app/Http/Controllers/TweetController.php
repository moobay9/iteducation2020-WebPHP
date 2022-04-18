<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Http\Requests\TweetRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TweetController extends Controller
{
    public function user_detail(User $user)
    {
        $followed = false;

        $login_user = Auth::user();
        foreach ($user->follower as $follower) {
            if ($login_user->id === $follower->user_id) {
                $followed = true;
            }
        }
        return view('user/page', ['user' => $user, 'followed' => $followed]);
    }

    public function tweet(TweetRequest $request)
    {
        $user = Auth::user();
        $tweet = new Tweet();
        $tweet->user_id = $user->id;
        $tweet->body    = $request->input('body');
        $tweet->save();

        return redirect(route('top'));
    }
}
