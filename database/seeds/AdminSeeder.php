<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use LaForum\Models\User;
use LaForum\Models\Role;

class AdminSeeder extends Seeder
{

    public function run()
    {
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@mail.x';
        $user->password = bcrypt('admin');

        $user->save();
        $role = Role::where('name', 'admin')->first();

        $user->attachRole($role);
    }
}
