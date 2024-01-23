<?php

namespace App\Http\Controllers\Admin\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ManagementUser\Role;
use App\Models\General\AccessMenu;
use App\Models\General\MainMenu;
use App\Models\General\Menu;
use App\User;
use Illuminate\Support\Facades\DB;
use SoftDeletes;

class RoleAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main_menu = MainMenu::get();
        $menu = Menu::get();
        return view('admin.general.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Role::get();
        return view('admin.general.role.display', ["data" => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Role::create($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Successfully added role ' . $request->role_name,
            'status' => $data ? 200 : 400,
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
        $data = Role::findOrFail($id);
        $main_menu = MainMenu::get();
        $menu = Menu::get();
        $access_menu = AccessMenu::where('id_role', $id)->get();

        return view('admin.general.role.action.access-control', ["main_menu" => $main_menu, "menu" => $menu, "data" => $data, "access_menu" => $access_menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Role::findOrFail($id);
        return response()->json([
            'data' => $data,
            'status' => $data ? 200 : 400,
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
        $data = Role::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'data' => $data,
            'message' => 'Successfully update data  ' . $data->role_name,
            'status' => $data ? 200 : 400,
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
        $data = Role::findOrFail($id);
        $data->delete();
        return response()->json([
            'data' => $data,
            'message' => 'Successfully delete data Role',
            'status' => $data ? 200 : 400,
        ]);
    }

    public function setAccess(Request $request)
    {
        if ($request->type == "add") {
            $data = AccessMenu::create($request->all());
            $message = '<h6>Successfully <span class="text-success">added</span> setting menu</h6>';
        } else if ($request->type == 'delete') {
            $data = AccessMenu::where('id_menu', $request->id_menu)->where('id_role', $request->id_role)->delete();
            $message = '<h6>Successfully <span class="text-danger">remove</span> setting menu</h6>';
        }


        return response()->json([
            'data' => $data,
            'message' => $message,
            'status' => $data ? 200 : 400,
        ]);
    }

    public function getDataRole($type)
    {
        if ($type == 'all') {
            $data = Role::get();
        } else {
            $data = Role::where('id', '=', $type)->get();
        }
        return response()->json([
            'data' => $data,
            'message' => 'Successfully get data role',
            'status' => $data ? 200 : 400,
        ]);
    }
}
