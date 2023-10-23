<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [BackendController::class, 'admin_dashboard'])->name('admin.dashboard');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/user/index', [UserController::class,  'index'])->name('user.index');
    Route::get('/user/delete/{id}', [UserController::class,  'delete'])->name('user.delete');
    Route::get('/user/info/{id}', [UserController::class,  'info'])->name('user.info');
    Route::post('/user/{id}/role', [UserController::class,  'user_role_assign'])->name('user.role.assign');
    Route::post('/user/{id}/permission', [UserController::class,  'user_permission_assign'])->name('user.permission.assign');
    Route::get('/user/{user_id}/role/{role_id}', [UserController::class,  'user_role_delete'])->name('user.role.delete');
    Route::get('/user/{user_id}/permission/{permission_id}', [UserController::class,  'user_permission_delete'])->name('user.permission.delete');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/role/index', [RoleController::class, 'index'])->name('role.index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role/delete/{id}', [RoleController::class, 'delete'])->name('role.delete');
    Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('/role/update/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::post('/role/permission/{id}', [RoleController::class, 'assign_permission'])->name('permission.assign');
    Route::get('/role/{role_id}/permission/{permission_id}', [RoleController::class, 'revoke_permission'])->name('permission.revoke');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/permission/index', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('/permission/store', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('/permission/delete/{id}', [PermissionController::class, 'delete'])->name('permission.delete');
    Route::get('/permission/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::post('/permission/update/{id}', [PermissionController::class, 'update'])->name('permission.update');
    Route::post('/permission/{role}/role', [PermissionController::class, 'assign_role'])->name('role.assign');
    Route::get('/permission/{permission_id}/role/{role_id}', [PermissionController::class, 'remove_role'])->name('role.remove');
});


require __DIR__ . '/auth.php';
