<?php

namespace LaForum\Http\Controllers\Admin;

use LaForum\Http\Requests\UserRequest;
use LaForum\Repositories\UserRepository;
use LaForum\Repositories\RoleRepository;
use LaForum\Models\User;
use LaForum\Models\Role;

class UserController extends Controller
{
    protected $userRepository;
    protected $roleRepository;

    public function __construct(UserRepository $userRepository,
                                RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $users = $this->userRepository->all();

        return view('admin.users.index',
            [
            'users' => $users,
        ]);
    }

    public function create()
    {
        return view('admin.users.create',
            [
            'roles' => $this->roleRepository->getMapped(),
        ]);
    }

    public function edit(User $user)
    {

        return view('admin.users.edit',
            [
            'user' => $user,
            'roles' => $this->roleRepository->getMapped(),
        ]);
    }

    public function store(UserRequest $request)
    {
        $this->userRepository->create($request->all());
    }

    public function update(User $user, UserRequest $request)
    {
        $this->userRepository->update($user, $request->all());
    }

    public function destroy(User $user)
    {
         $user->delete();
    }
}