<?php

use App\Http\Controllers\Users;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;

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

Route::get('/',[Dashboard::class, 'index']);
Route::get('/dashboard',[Dashboard::class, 'index']);
Route::get('/users',[Dashboard::class, 'get_users'])->name('get_users');
Route::get('/positions',[Dashboard::class, 'get_position'])->name('get_positions');
Route::get('/divisions',[Dashboard::class, 'get_division'])->name('get_divisions');
Route::get('/departments',[Dashboard::class, 'get_department'])->name('get_departments');

Route::get('/add_users',[Users::class, 'get_users_add'])->name('get_users_add');
Route::post('/add_users',[Users::class, 'store_user'])->name('user_add');
Route::get('/update_users/{id}',[Users::class, 'get_update_user'])->name('get_user_update');
Route::put('/update_users',[Users::class, 'update_user'])->name('user_update');
Route::get('/delete_users',[Users::class, 'get_delete_user'])->name('get_user_delete');
Route::delete('/delete_users/{id}',[Users::class, 'delete_user'])->name('user_delete');



Route::get('/login',[Authentication::class, 'get_login']);
Route::get('/register',[Authentication::class, 'get_register']);

