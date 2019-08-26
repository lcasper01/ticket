<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
            //Надо рефакторить
//        $this->call(UsersTableSeeder::class);
//        $this->call(RoleUsersTableSeeder::class);
//        $this->call(TicketSeeder::class);
    }
}
