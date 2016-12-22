<?php

namespace LaForum\Repositories;

use LaForum\Models\User;

class UserRepository extends SearchableRepository
{

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    protected function getSearchableFields()
    {
        return ['name',];
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
        $user->about = $data['about'];

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
