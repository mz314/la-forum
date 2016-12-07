<?php

namespace LaForum\Repositories;

use LaForum\Models\User;

class UserRepository extends Repository
{

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];

        if (!empty($data['password'])) {
            $user->password = $this->cryptPassword($data['password']);
        }
        $user->save();

        return $user;
    }

    public function update(User $user, $data)
    {
        $user->name = $data['name'];
        $user->email = $data['email'];

        if (!empty($data['password'])) {
            $user->password = $this->cryptPassword($data['password']);
        }
        $user->update();

        return $user;
    }

    private function cryptPassword($password)
    {
        return bcrypt($password);
    }
}
