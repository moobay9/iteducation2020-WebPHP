<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Http\Requests\TweetRequest;
use App\Http\Requests\ReplyTweetRequest;
use App\Http\Requests\TweetReplyRequest;
use App\Http\Requests\ReTweetRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TweetController extends Controller
{
    public function timeline()
    {
        $timelines = [];
        $user = Auth::user();
        $timelines = Tweet::timeline($user)->get();

        // foreach ($_timelines as $timeline) {

        //     $timelines[] = $timeline;
        // }

        return view('dashboard', ['user' => $user, 'timelines' => $timelines]);
    }

    public function user_detail(User $user)
    {
        $followed = false;
        $timelines = [];

        $login_user = Auth::user();
        foreach ($user->follower as $follower) {
            if ($login_user->id === $follower->user_id) {
                $followed = true;
            }
        }

        $_timelines = Tweet::timeline($user)->get();

        foreach ($_timelines as $timeline)
        {
            if ( ! $timeline->retweet_id) {
                $timelines[] = $timeline;
            } else {
                $timelines[] = Tweet::find($timeline->retweet_id);
            }
        }

        return view('user/page', ['user' => $user, 'followed' => $followed, 'timelines' => $timelines]);
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
    
    public function reply_tweet(ReplyTweetRequest $request)
    {
        $user = Auth::user();
        $tweet = new Tweet();
        $tweet->user_id = $user->id;
        $tweet->body    = $request->input('body');
        $tweet->parent_id = $request->input('parent_id');
        $tweet->save();

        return redirect(route('top'));
    }

    public function retweet(ReTweetRequest $request)
    {
        $user              = Auth::user();
        $tweet             = new Tweet();
        $tweet->user_id    = $user->id;
        $tweet->retweet_id = $request->input('retweet_id');
        $tweet->body       = '';
        $tweet->save();

        return redirect(route('top'));
    }
    
    public function reply(TweetReplyRequest $request)
    {
        $user = Auth::user();
        $reply_id = $request->input("reply_id");
        $reply = User::find($reply_id);
        
        $reply_tweet = Tweet::find($request->input('reply_tweet_id'));
        
        return view('form', ['user' => $user, 'reply' => $reply, 'reply_tweet' => $reply_tweet]);
    }
}
