<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
    $users = [
        [
           'name'=>'Admin',
           'email'=>'admin@itsolutionstuff.com',
           'type'=>1,
           'password'=> bcrypt('12345678'),
        ],
        [
           'name'=>'Pengguna',
           'email'=>'user@itsolutionstuff.com',
           'type'=>0,
           'password'=> bcrypt('12345678'),
        ],
    ];

    foreach ($users as $key => $user) {
        User::create($user);
    }
}
}

