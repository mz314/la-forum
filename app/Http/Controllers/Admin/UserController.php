<?php

namespace LaForum\Http\Controllers\Admin;

use LaForum\Http\Requests\UserRequest;
use LaForum\Repositories\UserRepository;
use LaForum\Models\User;
use LaForum\Models\Role;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->all();

        return view('admin.users.index',
            [
            'users' => $users,
        ]);
    }

    public function edit(User $user)
    {


        $roles = [];
        Role::all()->map(function($item) use(&$roles) {
            $roles[$item->id] = $item->display_name;
        });

       

        

        return view('admin.users.edit',
            [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function update(User $user, UserRequest $request)
    {
        var_dump($request->all());
        die;
    }
}