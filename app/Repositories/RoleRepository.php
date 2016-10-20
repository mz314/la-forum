<?php

namespace LaForum\Repositories;

use LaForum\Models\Role;

class RoleRepository extends Repository
{

    public function getMapped()
    {
        $roles = [];
        Role::all()->map(function($item) use(&$roles) {
            $roles[$item->id] = $item->display_name;
        });

        return $roles;
    }
}