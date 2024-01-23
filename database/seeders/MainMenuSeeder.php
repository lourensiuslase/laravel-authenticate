<?php

namespace Database\Seeders;

use App\Models\General\MainMenu;
use Illuminate\Database\Seeder;

class MainMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainMenu::create([
            'id' => 1,
            'main_menu_name' => 'Main',
            'main_menu_role' => 'all',
            'main_menu_route' => NULL,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        MainMenu::create([
            'id' => 2,
            'main_menu_name' => 'Master Data',
            'main_menu_role' => 'Super Admin,Top Management',
            'main_menu_route' => NULL,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);
        Mainmenu::create([
            'id' => 3,
            'main_menu_name' => 'body',
            'main_menu_role' => 'Super Admin,Top Management',
            'main_menu_route' => NULL,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        Mainmenu::create([
            'id' => 4,
            'main_menu_name' => 'General',
            'main_menu_role' => 'Super Admin,Top Management',
            'main_menu_route' => NULL,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);
        Mainmenu::create([
            'id' => 5,
            'main_menu_name' => 'management-user',
            'main_menu_role' => 'Super Admin,Top Management',
            'main_menu_route' => NULL,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);
    }
}
