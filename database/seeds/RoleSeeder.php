<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RoleSeeder extends Seeder 
{
     public function run()
    {
        DB::table('roles')->insert([
            'name' => 'user',
            'display_name'=>'regular user',
           
        ]);
        
          DB::table('roles')->insert([
            'name' => 'admin',
            'display_name'=>'admin',
           
        ]);
    }
}

