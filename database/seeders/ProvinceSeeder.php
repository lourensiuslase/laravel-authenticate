<?php

namespace Database\Seeders;

use App\Models\MasterData\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::create([
            'id' => 11,
            'state_name' => 'Aceh',
            'state_code' => 'ACH'
        ]);


        Province::create([
            'id' => 12,
            'state_name' => 'Sumatera Utara',
            'state_code' => 'SMU'
        ]);


        Province::create([
            'id' => 13,
            'state_name' => 'Sumatera Barat',
            'state_code' => 'SMB'
        ]);


        Province::create([
            'id' => 14,
            'state_name' => 'Riau',
            'state_code' => 'RIU'
        ]);


        Province::create([
            'id' => 15,
            'state_name' => 'Jambi',
            'state_code' => 'JMB'
        ]);


        Province::create([
            'id' => 16,
            'state_name' => 'Sumatera Selatan',
            'state_code' => 'SMS'
        ]);


        Province::create([
            'id' => 17,
            'state_name' => 'Bengkulu',
            'state_code' => 'BNG'
        ]);


        Province::create([
            'id' => 18,
            'state_name' => 'Lampung',
            'state_code' => 'LPG'
        ]);


        Province::create([
            'id' => 19,
            'state_name' => 'Kepulauan Bangka Belitung',
            'state_code' => 'KBB'
        ]);


        Province::create([
            'id' => 21,
            'state_name' => 'Kepulauan Riau',
            'state_code' => 'KRU'
        ]);


        Province::create([
            'id' => 31,
            'state_name' => 'DKI Jakarta',
            'state_code' => 'JKT'
        ]);


        Province::create([
            'id' => 32,
            'state_name' => 'Jawa Barat',
            'state_code' => 'JBR'
        ]);


        Province::create([
            'id' => 33,
            'state_name' => 'Jawa Tengah',
            'state_code' => 'JTG'
        ]);


        Province::create([
            'id' => 34,
            'state_name' => 'DI Yogyakarta',
            'state_code' => 'YOG'
        ]);


        Province::create([
            'id' => 35,
            'state_name' => 'Jawa Timur',
            'state_code' => 'JTM'
        ]);


        Province::create([
            'id' => 36,
            'state_name' => 'Banten',
            'state_code' => 'BNT'
        ]);


        Province::create([
            'id' => 51,
            'state_name' => 'Bali',
            'state_code' => 'BLI'
        ]);


        Province::create([
            'id' => 52,
            'state_name' => 'Nusa Tenggara Barat',
            'state_code' => 'NTB'
        ]);


        Province::create([
            'id' => 53,
            'state_name' => 'Nusa Tenggara Timur',
            'state_code' => 'NTT'
        ]);


        Province::create([
            'id' => 61,
            'state_name' => 'Kalimantan Barat',
            'state_code' => 'KBR'
        ]);


        Province::create([
            'id' => 62,
            'state_name' => 'Kalimantan Tengah',
            'state_code' => 'KTG'
        ]);


        Province::create([
            'id' => 63,
            'state_name' => 'Kalimantan Selatan',
            'state_code' => 'KSL'
        ]);


        Province::create([
            'id' => 64,
            'state_name' => 'Kalimantan Timur',
            'state_code' => 'KTM'
        ]);


        Province::create([
            'id' => 65,
            'state_name' => 'Kalimantan Utara',
            'state_code' => 'KUT'
        ]);


        Province::create([
            'id' => 71,
            'state_name' => 'Sulawesi Utara',
            'state_code' => 'SUT'
        ]);


        Province::create([
            'id' => 72,
            'state_name' => 'Sulawesi Tengah',
            'state_code' => 'STG'
        ]);


        Province::create([
            'id' => 73,
            'state_name' => 'Sulawesi Selatan',
            'state_code' => 'SSL'
        ]);


        Province::create([
            'id' => 74,
            'state_name' => 'Sulawesi Tenggara',
            'state_code' => 'STR'
        ]);


        Province::create([
            'id' => 75,
            'state_name' => 'Gorontalo',
            'state_code' => 'GOR'
        ]);


        Province::create([
            'id' => 76,
            'state_name' => 'Sulawesi Barat',
            'state_code' => 'SBR'
        ]);


        Province::create([
            'id' => 81,
            'state_name' => 'Maluku',
            'state_code' => 'MLK'
        ]);


        Province::create([
            'id' => 82,
            'state_name' => 'Maluku Utara',
            'state_code' => 'MKU'
        ]);


        Province::create([
            'id' => 91,
            'state_name' => 'Papua Barat',
            'state_code' => 'PPB'
        ]);


        Province::create([
            'id' => 92,
            'state_name' => 'Papua',
            'state_code' => 'PPA'
        ]);
    }
}
