<?php

namespace LaForum\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use LaForum\Models\User;
use LaForum\Http\Requests\UserRequest;
use LaForum\Repositories\UserRepository;

class ProfileController extends Controller
{

    protected $userRepository;
    
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
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

        if ($user == Auth::user()) {
            return view('profile.user_index', [
                'user' => $user,
            ]);
        } else {
            return view('profile.public_index', [
                'user' => $user,
            ]);
        }
    }

    public function store(UserRequest $request)
    {


        if ($request->file('avatar')) {
            $imageName = md5(time()) . '.' . $request->file('avatar')->getClientOriginalExtension();


            $request->file('avatar')->move(
                Config::get('app.path.avatars'), $imageName
            );

            Auth::user()->avatar = $imageName;
            Auth::user()->save();
        }

        
        $this->userRepository->update(Auth::user(), $request->all());
        

        return redirect()->action('ProfileController@index', null);
    }
}
