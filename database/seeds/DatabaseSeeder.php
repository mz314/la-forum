<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder 
{
     public function run()
    {
        $this->call('RoleSeeder');
        $this->call('AdminSeeder');
    }
}

