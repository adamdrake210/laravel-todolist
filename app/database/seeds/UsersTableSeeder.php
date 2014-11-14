<?php

class UsersTableSeeder extends Seeder {



    public function run()
    {
        User::truncate();
        User::create([
           'username' => 'AdamDrake',
            'email' => 'adamgedrake@gmail.com',
            'password' => 'secret'
        ]);

        User::create([
            'username' => 'SimonaDrake',
            'email' => 'drake.simona@gmail.com',
            'password' => 'secret'
        ]);
    }
}