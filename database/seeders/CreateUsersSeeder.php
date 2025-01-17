<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
            'name'=>'Admin User',
            'email'=>'admin@gmail.com',
            'role'=>1,
            'password'=>bcrypt('12345678'),
        ],
        [
            'name'=>'User 1',
            'email'=>'user1@gmail.com',
            'role'=>0,
            'password'=>bcrypt('12345678'),
        ],
        [
            'name'=>'SuperAdmin',
            'email'=>'superadmin@gmail.com',
            'role'=>2,
            'password'=>bcrypt('12345678'), 
        ],
    ];
    foreach($users as $key => $user){
        User::create($user);
    }
    }
}
