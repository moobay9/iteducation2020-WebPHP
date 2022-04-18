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
        return view('user/page');
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
