<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use App\Models\MasterData\City;
use App\Models\MasterData\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index()
    {
        $province = Province::orderBy('id', 'ASC')->get();

        return view('admin.master-data.provinces.index', ['province' => $province]);
    }

    public function getCityByProvince($id)
    {
        $province = City::orderBy('city_name', 'ASC')->where('id_state', $id)->get();
        return response()->json([
            'province' => $province,
            'message' => 'Berhasil menghapus mendapatkan data Kota',
            'status' => 200,
        ]);
    }
}
