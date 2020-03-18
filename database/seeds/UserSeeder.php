<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [[
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'user_level' => 1
        ],[           
            'name' => 'teacher',
            'email' => 'teacher@gmail.com',
            'password' => bcrypt('secret'),
            'user_level' => 2
        ],[           
            'name' => 'joni',
            'email' => 'student@gmail.com',
            'password' => bcrypt('secret'),
            'user_level' => 3
            ]
            ];
        //

        foreach ($users as $user) {
        DB::table('users')->insert($user);
        }
    }
}
