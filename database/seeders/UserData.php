<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => bcrypt('123'),
                'level' => 1,
                'email' => 'admin@gmail.com',
            ],
            [
                'name' => 'Kasir',
                'username' => 'kasir',
                'password' => bcrypt('123'),
                'level' => 1,
                'email' => 'kasir@gmail.com',
            ],
            [
                'name' => 'Pimpinan',
                'username' => 'pimpinan',
                'password' => bcrypt('123'),
                'level' => 1,
                'email' => 'pimpinan@gmail.com',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
