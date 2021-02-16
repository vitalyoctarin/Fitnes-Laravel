<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;

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

Auth::routes([
    'confirm' => false,
    'forgot' => false,
    'login' => true,
    'register' => true,
    'reset' => false,
    'verification' => false,
]);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('trainers', TrainerController::class);
    Route::resource('groups', GroupController::class)->only([
        'index', 'create', 'edit', 'store', 'update','destroy'
    ]);
    Route::get('/reports', function () { return view('reports'); })->name('reports');
    Route::resource('timetable', TimetableController::class)->only([
        'index', 'create', 'edit', 'store', 'update','destroy'
    ]);
    Route::resource('applications', ApplicationController::class);
    Route::resource('clients', ClientController::class);
    Route::post('application/{id}', [ApplicationController::class, 'createClient'])->name('applications.createClient');
});
