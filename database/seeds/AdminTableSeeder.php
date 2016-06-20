<?php

use Illuminate\Database\seeder;
use Elihans\Admin;
use Elihans\User;

class AdminTableSeeder extends Seeder {

    public function run()
    {
        Admin::truncate();

            $admin = Admin::create(array(
                'name' => 'Administrator',
                'username'=>'admin'));

            User::create(array(
                'username'=> $admin->username,
                'userable_id'=>$admin->id,
                'userable_type'=>"Elihans\\Admin",
                'password' => bcrypt('3l1_Adm1n2015')
            ));
    }
}
