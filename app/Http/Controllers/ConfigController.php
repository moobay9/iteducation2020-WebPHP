<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ConfigPublicRequest;
use App\Http\Requests\ConfigNameRequest;
use App\Http\Requests\ConfigAtNameRequest;
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
    
    public function name_update(ConfigNameRequest $request)
    {
        $formdata = $request->all();
        $user = Auth::user();
        $user->name = $formdata['name'];
        $user->save();

        return redirect(route('config'));
    }
    
    public function at_name_update(ConfigAtNameRequest $request)
    {
        $formdata = $request->all();
        $user = Auth::user();
        $user->at_name = $formdata['at_name'];
        $user->save();

        return redirect(route('config'));
    }
}
