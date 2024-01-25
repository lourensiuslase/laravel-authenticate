<?php

namespace App\Http\Controllers\Admin\General;

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

        return view('admin.general.profile.index', ["data" => $data]);
    }

    public function create()
    {
        $user = Auth::user();
        $data = DB::table('users')
            ->select('users.*', 'roles.role_name')
            ->join('roles', 'users.id_role', '=', 'roles.id')
            ->first();
        return view('admin.general.profile.display', ["data" => $data, 'user' => $user]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Auth::user($id)->toArray();
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
        ]);
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

    public function destroy($id)
    {
        //
    }
}
