<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
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
        User::create([
            'name' => 'Administrator',
            'username' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt("admin"),
            'id_role' => 1,
            'remember_token' => Str::random(50),
        ]);
        User::create([
            'name' => 'Top Management',
            'username' => 'Top Management',
            'email' => 'topmanagement@gmail.com',
            'password' => bcrypt("topmanagement"),
            'id_role' => 2,
            'remember_token' => Str::random(50),
        ]);
        User::create([
            'name' => 'Admin Kantor',
            'username' => 'Admin Kantor',
            'email' => 'adminkantor@gmail.com',
            'password' => bcrypt("adminkantor"),
            'id_role' => 3,
            'remember_token' => Str::random(50),
        ]);
        User::create([
            'name' => 'Admin Proyek',
            'username' => 'Admin Proyek',
            'email' => 'adminproyek@gmail.com',
            'password' => bcrypt("adminproyek"),
            'id_role' => 4,
            'remember_token' => Str::random(50),
        ]);
    }
}
