<?php

namespace App\Http\Controllers\Admin\General;

use App\Http\Controllers\Controller;
use App\Models\ManagementUser\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'name' => 'required',
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',
                'id_role' => 'required',
                // 'bg_color' => 'required',
            ],
            [
                'name.required' => 'Please required Name User',
                'username.required' => 'Please required Username User',
                'email.required' => 'Please required Email User',
                'password.required' => 'Please required Password User',
                'id_role.required' => 'Please required Role User',
                // 'bg_color.required' => 'Please required Background Color'
            ],
        );
    }


    public function index()
    {
        $roles = Role::get();
        $users = DB::table('users')
            ->select('users.*', 'roles.role_name')
            ->join('roles', 'users.id_role', 'roles.id')
            ->get();

        return view('admin.general.user-management.index', ["roles" => $roles, "users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('users')
            ->select('users.*', 'roles.role_name')
            ->join('roles', 'users.id_role', 'roles.id')
            ->get();

        return view('admin.general.user-management.display', ["data" => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_validation($request);
        $data = $request->all();
        $role = Role::findOrFail($request->id_role);
        // $data['username'] = $request->username;
        $data['role_name'] = $role->role_name;
        $data['password'] = bcrypt($request->password);
        $data['forgot_passcode'] = $request->password;
        $user = User::create($data);
        $user = ['name' => $user->name, 'email' => $user->email, 'code' => $request->password];

        return response()->json([
            'data' => $data,
            'message' => 'Successfully added user : ' . $request->username,
            'status' => $data ? 200 : 400,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findOrFail($id);
        return response()->json([
            'data' => $data,
            'message' => 'Successfully get user : ' . $data->username,
            'status' => $data ? 200 : 400,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        return response()->json([
            'data' => $data,
            'message' => 'Successfully get user : ' . $data->username,
            'status' => $data ? 200 : 400,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data_update['username'] = $request->username;
        $data_update['name'] = $request->name;
        $data_update['email'] = $request->email;
        $data_update['id_role'] = $request->id_role;
        $data_update['is_active'] = $request->is_active;
        $data_update['phone'] = $request->phone;

        $role = Role::findOrFail($request->id_role);
        $data_update['role_name'] = $role->role_name;
        $data->update($data_update);

        return response()->json([
            'data' => $data,
            'message' => 'Successfully update data  ' . $data->username,
            'status' => $data ? 200 : 400,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        $data_update['is_active'] = 0;
        $data->update($data_update);

        return response()->json([
            'data' => $data,
            'message' => 'Successfully delete data User',
            'status' => $data ? 200 : 400,
        ]);
    }

    public function search(Request $request)
    {
        extract($request->all());
        $searchParams = [];

        if ($role_name !== '') {
            $searchParams['users.name'] = $role_name;
        }

        if ($status !== null) {
            $searchParams['users.is_active'] = $status;
        }
        $user = User::where('deleted_at', null);
        $qb = $user->newQuery();
        $qb->select('error');
        $qb->select('users.*');

        foreach ($searchParams as $k => $v) {
            if ($k === 'users.name') {
                $qb->whereRaw("UPPER({$k}) LIKE '%" . strtoupper($v) . "%'");
            } else {
                if (is_numeric($v)) {
                    $qb->where($k, $v);
                } else {
                    $qb->whereRaw("$k = '$v'");
                }
            }
        }

        $data = $qb->get();

        return view('admin.general.user-management.display', ["data" => $data]);
    }
}
