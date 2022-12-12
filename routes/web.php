<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DepartmentController;

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

Route::get('/',[Dashboard::class, 'index'])->name('dashboard');
Route::get('/dashboard',[Dashboard::class, 'index']);

// Users Route
Route::get('/users',[UserController::class, 'index'])->name('get_users');
Route::get('/add_users',[UserController::class, 'get_users_add'])->name('get_users_add');
Route::post('/add_users',[UserController::class, 'store_user'])->name('user_add');
Route::get('/update_users/{id}',[UserController::class, 'get_update_user'])->name('get_user_update');
Route::put('/update_users',[UserController::class, 'update_user'])->name('user_update');
Route::get('/delete_users',[UserController::class, 'get_delete_user'])->name('get_user_delete');
Route::delete('/delete_users/{id}',[UserController::class, 'delete_user'])->name('user_delete');

// Positions Route
Route::get('/positions',[Dashboard::class, 'get_position'])->name('get_positions');

// Divisions Route
Route::get('/divisions',[DivisionController::class, 'index'])->name('get_divisions');
Route::get('/add_divisions',[DivisionController::class, 'create'])->name('get_div_add');
Route::post('/add_divisions',[DivisionController::class, 'store'])->name('div_add');
Route::get('/update_divisions/{id}',[DivisionController::class, 'edit'])->name('get_div_update');
Route::put('/update_divisions',[DivisionController::class, 'update'])->name('div_update');
Route::get('/delete_divisions',[DivisionController::class, 'get_destroy'])->name('get_div_delete');
Route::delete('/delete_divisions/{id}',[DivisionController::class, 'destroy'])->name('div_delete');

// Departments Route
Route::get('/departments',[DepartmentController::class, 'index'])->name('get_departments');
Route::get('/add_departments',[DepartmentController::class, 'create'])->name('get_dept_add');
Route::post('/add_departments',[DepartmentController::class, 'store'])->name('dept_add');
Route::get('/update_departments/{id}',[DepartmentController::class, 'edit'])->name('get_dept_update');
Route::put('/update_departments',[DepartmentController::class, 'update'])->name('dept_update');
Route::get('/delete_departments',[DepartmentController::class, 'get_destroy'])->name('get_dept_delete');
Route::delete('/delete_departments/{id}',[DepartmentController::class, 'destroy'])->name('dept_delete');

//Logbook
Route::get('/logbook',[LogbookController::class, 'index'])->name('get_logbook');
Route::get('/add-logbook',[LogbookController::class, 'create'])->name('get_logbook_add');
Route::post('/add-logbook',[LogbookController::class, 'store'])->name('logbook_add');
Route::get('/update-logbook/{id}',[LogbookController::class, 'edit'])->name('get_logbook_update');
Route::put('/update-logbook',[LogbookController::class, 'update'])->name('logbook_update');
Route::get('/delete-logbook',[LogbookController::class, 'get_destroy'])->name('get_logbook_update');
Route::delete('/delete-logbook/{id}',[LogbookController::class, 'destroy'])->name('logbook_delete');

Route::get('/login',[Authentication::class, 'get_login']);
Route::get('/register',[Authentication::class, 'get_register']);

