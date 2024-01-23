<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\General\RoleAccessController;
use App\Http\Controllers\Admin\General\SettingController;
use App\Http\Controllers\Admin\General\UserManagementController;
use App\Http\Controllers\Admin\ManagementUser\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('store', 'store')->name('store');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    #Dashboard
    Route::get('dashboard', function () {
        return view('admin.dashboard.index');
    })->name('dashboard');

    #General
    Route::resource('admin/general/user-management', 'App\Http\Controllers\Admin\General\UserManagementController');
    Route::post('admin/general/user-management/search', 'App\Http\Controllers\Admin\General\UserManagementController@search');

    #Role Access
    Route::resource('admin/general/role-access', 'App\Http\Controllers\Admin\General\RoleAccessController');
    Route::resource('admin/general/setting', 'App\Http\Controllers\Admin\General\SettingController');
    Route::post('admin/general/role-access/set-access', 'App\Http\Controllers\Admin\General\RoleAccessController@setAccess');
    Route::get('admin/general/role/get-data/{type}', 'App\Http\Controllers\Admin\General\RoleAccessController@getDataRole');

    #Management User
    Route::resource('admin/management-user/role', 'App\Http\Controllers\Admin\ManagementUser\RoleController');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
});












#Download File
Route::get('download/{filename}', function ($filename) {
    $file_path = storage_path('app/public/' . $filename);
    if (file_exists($file_path)) {
        return Response::download($file_path, $filename, ['Content-Length: ' . filesize($file_path)]);
    } else {
        exit('File yang ada request tidak ditemukan di server kami!');
    }
})->where('filename', '[A-Za-z0-9\-\_\.]+')->name('download_file');

#View File
Route::get('files/{filename}', function ($filename) {
    $path = storage_path('app/public/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('storage_file');


