<?php

namespace Database\Seeders;

use App\Models\General\AccessMenu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AccessMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        AccessMenu::truncate();
        Schema::enableForeignKeyConstraints();

        AccessMenu::create([
            'id' => 1,
            'id_menu' => 1,
            'id_role' => 1,
            'created_at' => '2022-10-15 10:55:26',
            'updated_at' => '2022-10-15 10:55:26'
        ]);

        AccessMenu::create([
            'id' => 2,
            'id_menu' => 2,
            'id_role' => 1,
            'created_at' => '2022-10-15 10:55:29',
            'updated_at' => '2022-10-15 10:55:29'
        ]);

        AccessMenu::create([
            'id' => 3,
            'id_menu' => 3,
            'id_role' => 1,
            'created_at' => '2022-10-15 10:55:30',
            'updated_at' => '2022-10-15 10:55:30'
        ]);

        AccessMenu::create([
            'id' => 4,
            'id_menu' => 4,
            'id_role' => 1,
            'created_at' => '2022-10-15 10:55:33',
            'updated_at' => '2022-10-15 10:55:33'
        ]);
        AccessMenu::create([
            'id' => 5,
            'id_menu' => 4,
            'id_role' => 1,
            'created_at' => '2022-10-15 10:55:33',
            'updated_at' => '2022-10-15 10:55:33'
        ]);
    }
}
