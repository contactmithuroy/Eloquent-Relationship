<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ImageController;

use App\Http\Controllers\StudentController;

use App\Http\Controllers\PostController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\RoleController;

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

// Route::get('/', function () {
//     return view('welcome');
// });



// many to many relationship

Route::get('/add-roles',[RoleController::class,'addRole']);

Route::get('/add-users',[RoleController::class,'addUser']);
// get role <=> user
Route::get('/rolebyuser/{id}',[RoleController::class,'getAllRolesByUser']);
Route::get('/userbyrole/{id}',[RoleController::class,'getAllUsersByRole']);
