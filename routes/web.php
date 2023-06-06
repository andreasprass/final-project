<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\ScoringController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\NormalizeController;
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

Route::get('/login',[AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class, 'validation'])->name('validation')->middleware('guest');
Route::get('/register',[AuthController::class, 'register'])->name('get_register')->middleware('guest');
Route::post('/register',[AuthController::class, 'store_register'])->name('register')->middleware('guest');

Route::post('/logout',[AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/',[Dashboard::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/dashboard',[Dashboard::class, 'index'])->name('dashboard')->middleware('auth');

//Route masih satu persatu agar tidak lupa, next development bisa di rapikan dan grouping

// Users Route
Route::get('/users',[UserController::class, 'index'])->name('get_users')->middleware('auth');
Route::get('/add_users',[UserController::class, 'get_users_add'])->name('get_users_add')->middleware('auth');
Route::post('/add_users',[UserController::class, 'store_user'])->name('user_add')->middleware('auth');
Route::get('/update_users/{id}',[UserController::class, 'get_update_user'])->name('get_user_update')->middleware('auth');
Route::put('/update_users',[UserController::class, 'update_user'])->name('user_update')->middleware('auth');
Route::get('/delete_users',[UserController::class, 'get_delete_user'])->name('get_user_delete')->middleware('auth');
Route::delete('/delete_users/{id}',[UserController::class, 'delete_user'])->name('user_delete')->middleware('auth');

// Positions Route
Route::get('/positions',[Dashboard::class, 'get_position'])->name('get_positions')->middleware('auth');

// Divisions Route
Route::get('/divisions',[DivisionController::class, 'index'])->name('get_divisions')->middleware('auth');
Route::get('/add_divisions',[DivisionController::class, 'create'])->name('get_div_add')->middleware('auth');
Route::post('/add_divisions',[DivisionController::class, 'store'])->name('div_add')->middleware('auth');
Route::get('/update_divisions/{id}',[DivisionController::class, 'edit'])->name('get_div_update')->middleware('auth');
Route::put('/update_divisions',[DivisionController::class, 'update'])->name('div_update')->middleware('auth');
Route::get('/delete_divisions',[DivisionController::class, 'get_destroy'])->name('get_div_delete')->middleware('auth');
Route::delete('/delete_divisions/{id}',[DivisionController::class, 'destroy'])->name('div_delete')->middleware('auth');

// Departments Route
Route::get('/departments',[DepartmentController::class, 'index'])->name('get_departments')->middleware('auth');
Route::get('/add_departments',[DepartmentController::class, 'create'])->name('get_dept_add')->middleware('auth');
Route::post('/add_departments',[DepartmentController::class, 'store'])->name('dept_add')->middleware('auth');
Route::get('/update_departments/{id}',[DepartmentController::class, 'edit'])->name('get_dept_update')->middleware('auth');
Route::put('/update_departments',[DepartmentController::class, 'update'])->name('dept_update')->middleware('auth');
Route::get('/delete_departments',[DepartmentController::class, 'get_destroy'])->name('get_dept_delete')->middleware('auth');
Route::delete('/delete_departments/{id}',[DepartmentController::class, 'destroy'])->name('dept_delete')->middleware('auth');

//Logbook
Route::get('/logbook',[LogbookController::class, 'index'])->name('get_logbook')->middleware('auth');
Route::get('/logbook-acc/{id}',[LogbookController::class, 'get_acc'])->name('get_acc')->middleware('auth');
Route::put('/logbook-acc',[LogbookController::class, 'acc'])->name('logbook_acc')->middleware('auth');
Route::get('/add-logbook',[LogbookController::class, 'create'])->name('get_logbook_add')->middleware('auth');
Route::post('/add-logbook',[LogbookController::class, 'store'])->name('logbook_add')->middleware('auth');
Route::get('/update-logbook/{id}',[LogbookController::class, 'edit'])->name('get_logbook_update')->middleware('auth');
Route::put('/update-logbook',[LogbookController::class, 'update'])->name('logbook_update')->middleware('auth');
Route::get('/delete-logbook',[LogbookController::class, 'get_destroy'])->name('get_logbook_update')->middleware('auth');
Route::delete('/delete-logbook/{id}',[LogbookController::class, 'destroy'])->name('logbook_delete')->middleware('auth');


Route::get('/criterias',[CriteriaController::class, 'index'])->name('criterias')->middleware('auth');
Route::get('/add-criterias',[CriteriaController::class, 'create'])->name('get_criteria_add')->middleware('auth');
Route::post('/add-criterias',[CriteriaController::class, 'store'])->name('criteria_add')->middleware('auth');

Route::get('/scoring',[ScoringController::class, 'index'])->name('scoring')->middleware('auth');
Route::get('/add-scoring',[ScoringController::class, 'create'])->name('get_scoring_add')->middleware('auth');
Route::post('/add-scoring',[ScoringController::class, 'store'])->name('scoring_add')->middleware('auth');
Route::get('/update_scoring/{id}',[ScoringController::class, 'get_update_scoring'])->name('get_scoring_update')->middleware('auth');
Route::put('/update-scoring',[ScoringController::class, 'update'])->name('scoring_update')->middleware('auth');
Route::delete('/delete_scoring/{id}',[ScoringController::class, 'delete_scoring'])->name('scoring_delete')->middleware('auth');

//Normalisasi
Route::get('/normalize',[NormalizeController::class, 'index'])->name('normalize')->middleware('auth');
