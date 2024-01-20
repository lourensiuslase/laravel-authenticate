<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $data = Auth::user();
        return view('profile.index', ["data" => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Successfully update data',
            'status' => $data ? 200 : 400,
        ]);
    }
}
