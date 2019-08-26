<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@ya.ru',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@ya.ru',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@ya.ru',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'root',
            'email' => 'root@ya.ru',
            'password' => bcrypt('secret'),
        ]);

    }
}
