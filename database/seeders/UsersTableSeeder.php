<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'name' => 'shakil',
            'email' => 'shakil@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'name' => 'shakib',
            'email' => 'shakib@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'name' => 'rafi',
            'email' => 'rafi@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'name' => 'dolon',
            'email' => 'dolon@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
