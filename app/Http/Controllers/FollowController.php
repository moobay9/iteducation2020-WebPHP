<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FollowSubscribeRequest;
use App\Models\Follow;

class FollowController extends Controller
{
    public function subscribe(FollowSubscribeRequest $request)
    {
        $formdata                 = $request->all();
        $follow                   = new Follow();
        $follow->user_id          = $formdata['user_id'];
        $follow->relation_user_id = $formdata['target_id'];
        $follow->save();

        return redirect(url()->previous());
    }

    public function unsubscribe(FollowSubscribeRequest $request)
    {
        $formdata                 = $request->all();
        $follow = Follow::where('user_id', $formdata['user_id'])
            ->where('relation_user_id', $formdata['target_id'])
            ->first();

        if($follow->count() > 0){
            $follow->delete();
        }

        return redirect(url()->previous());
    }
}
