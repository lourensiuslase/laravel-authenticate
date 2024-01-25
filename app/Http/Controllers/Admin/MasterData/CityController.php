<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function index()
    {
        $city = DB::table('cities')
            ->join('provinces', 'provinces.id', 'cities.id_state')
            ->select('cities.*','provinces.state_name','provinces.state_code')->get();

        return view('admin.master-data.cities.index', ['city' => $city]);
    }
}
