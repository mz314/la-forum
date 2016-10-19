<?php

namespace LaForum\Repositories;

use LaForum\Models\User;

class UserRepository extends Repository
{

    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
