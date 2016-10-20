<?php

namespace LaForum\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use LaForum\Models\User;
use LaForum\Models\Role;
use LaForum\Http\Requests\UserRequest;

class ProfileController extends Controller
{

    public function index($name = null)
    {
        if ($name) {
            $user = User::where('name', $name)->first();
            if (!$user) {
                App::abort(404);
            }
        } else {
            $user = Auth::user();
        }

        return view('profile.index', [
            'user' => $user,
        ]);
    }

    public function store(UserRequest $request) //UserRequest is wrong - only admin
    {


        $imageName = md5(time()).'.'.$request->file('avatar')->getClientOriginalExtension();

        $request->file('avatar')->move(
            Config::get('app.path.avatars'), $imageName
        );

        Auth::user()->avatar = $imageName;
        Auth::user()->save();
    }
}