<?php

namespace LaForum\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use LaForum\Models\User;
use LaForum\Models\Role;

class ProfileController extends Controller
{

    public function index($name = null)
    {
        if ($name) {
            $user = User::where('name',  $name)->first();
            if(!$user) {
                App::abort(404);
            }
        } else {
            $user = Auth::user();
        }

        return view('profile.index', [
            'user' => $user,
        ]);
    }
}
