<?php

namespace App\Http\Controllers\Admin\ManagementUser;

use App\Http\Controllers\Controller;
use App\Models\ManagementUser\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.management-user.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('role_level', 'ASC')->get();
        return view('admin.management-user.role.display', ["roles" => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create($request->all());

        return response()->json([
            'data' => $role,
            'message' => 'Berhasil menambahkan data '.$role->role_name,
            'status' => $role ? 200 : 400,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $count = Role::count();
        if($count > 0){
            $last_data =  Role::latest('id')->first();
            $last_role_code = substr ($last_data->role_code, -3);
            if(str_contains($last_role_code, "00")){
                $sequence = substr ($last_role_code, -1) + 1;
            }else if(str_contains($last_role_code, "0")){
                $sequence = substr ($last_role_code, -2) + 1;
            }else{
                $sequence =  $last_data->id + 1;
            }
        }else{
            $sequence =  1;
        }
        $output = '';
        if($sequence == 1){
            $sequence = 1;
        }
        if(strlen($sequence) == 1){
            $output = '00'.$sequence;
        }else if(strlen($sequence) == 2){
            $output = '0'.$sequence;
        }else{
            $output = $sequence;
        }
        $code_role = "RL-".$output;

        return response()->json([
            'data' => $code_role,
            'status' => 200 ,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return response()->json([
            'data' => $role,
            'status' => $role ? 200 : 400,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());

        return response()->json([
            'data' => $role,
            'message' => 'Berhasil mengubah data '.$role->role_name,
            'status' => $role ? 200 : 400,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::destroy($id);

        return response()->json([
            'data' => $id,
            'message' => 'Berhasil menghapus data peran',
            'status' => 200,
        ]);
    }
}
