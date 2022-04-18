<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ConfigPublicRequest;
use App\Models\User;

class ConfigController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('config/index', ['user' => $user]);
    }

    public function public_update(ConfigPublicRequest $request)
    {
        $formdata = $request->all();
        $user = Auth::user();
        $user->is_public = $formdata['is_public'];
        $user->save();

        return redirect(route('config'));
    }
}
