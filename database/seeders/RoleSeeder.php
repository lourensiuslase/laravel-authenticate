<?php

namespace Database\Seeders;

use App\Models\ManagementUser\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role_code'=>'RL-001',
            'role_name' => 'Super Admin',
            'role_level' => 1,
            'role_description' => 'Super Admin',
        ]);
        Role::create([
            'role_code'=>'RL-002',
            'role_name' => 'Top Management',
            'role_level' => 1,
            'role_description' => 'Top Management',
        ]);
        Role::create([
            'role_code'=>'RL-003',
            'role_name' => 'Admin Kantor',
            'role_level' => 3,
            'role_description' => 'Admin Kantor',
        ]);
        Role::create([
            'role_code'=>'RL-004',
            'role_name' => 'Admin Proyek',
            'role_level' => 3,
            'role_description' => 'Admin Proyek',
        ]);
        Role::create([
            'role_code'=>'RL-005',
            'role_name' => 'Pelaksana',
            'role_level' => 3,
            'role_description' => 'Pelaksana',
        ]);
        Role::create([
            'role_code'=>'RL-006',
            'role_name' => 'Logistik',
            'role_level' => 3,
            'role_description' => 'Logistik',
        ]);
        Role::create([
            'role_code'=>'RL-007',
            'role_name' => 'Site Manager',
            'role_level' => 2,
            'role_description' => 'Site Manager',
        ]);
        Role::create([
            'role_code'=>'RL-008',
            'role_name' => 'Event Manager',
            'role_level' => 2,
            'role_description' => 'Event Manager',
        ]);
    }
}
