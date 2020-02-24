<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$Cv68LyX4s1wZUIhrvvE/Hu.SOxa6TyisZeceq5JkYQzY85CSLZ3MC',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
