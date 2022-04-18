<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Http\Requests\TweetRequest;


class TweetController extends Controller
{
    public function tweet(TweetRequest $request)
    {
        var_dump($request->all());
    }
}
