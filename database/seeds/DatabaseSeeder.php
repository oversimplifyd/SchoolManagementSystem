<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Elihans\User;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        /*$this->call("StudentTableSeeder");
        $this->call("TeacherTableSeeder");
        $this->call("AdminTableSeeder");
        $this->call("GuardianTableSeeder");
        $this->call("NewsBoardTableSeeder");
        $this->call("StudentCslassTableSeeder");
        $this->call("ClassGroupTableSeeder");
        $this->call("ClassTypeTableSeeder");
        $this->call("TermTableSeeder");
        $this->call("SubjectTableSeeder");
        $this->call("CategoryTableSeeder");
        $this->call("ThreadTableSeeder");
        $this->call("PostTableSeeder");*/

        $this->call("StudentClassTableSeeder");
        $this->call("TeacherTableSeeder");
        $this->call("StudentTableSeeder");

        /*
        $this->call("ClassGroupTableSeeder");
        $this->call("ClassTypeTableSeeder");
        $this->call("TermTableSeeder");*/

    }
}
