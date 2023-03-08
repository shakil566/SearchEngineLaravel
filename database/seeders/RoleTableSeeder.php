<?php

namespace Database\Seeders;

use App\Models\BlogPosts;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'title' => 'Super Admin',
        ]);
        Role::create([
            'title' => 'Admin',
        ]);
        Role::create([
            'title' => 'Executive',
        ]);
    }
}
