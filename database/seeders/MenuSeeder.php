<?php

namespace Database\Seeders;

use App\Models\General\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Menu::truncate();
        Schema::enableForeignKeyConstraints();

        Menu::create([
            'id' => 1,
            'id_main_menu' => 1,
            'menu_name' => 'Dashboard',
            'main_menu_url' => '/admin/dashboard',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        Menu::create([
            'id' => 2,
            'id_main_menu' => 4,
            'menu_name' => 'User Management',
            'main_menu_url' => '/admin/general/user-management',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        Menu::create([
            'id' => 3,
            'id_main_menu' => 4,
            'menu_name' => 'Akses Role',
            'main_menu_url' => '/admin/general/role-access',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        Menu::create([
            'id' => 4,
            'id_main_menu' => 5,
            'menu_name' => 'Role',
            'main_menu_url' => '/admin/management-user/role',
            'created_at' => NULL,
            'updated_at' => NULL
        ]);
    }
}
