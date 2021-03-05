<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\LvlpreparationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceslistController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;

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

Route::get('api/getAllPrices',function ()
{
    return [
        'Subscriptions' => \App\Models\Subscription::all(),
        'Services' => \App\Models\Service::all()
    ];
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('trainers', TrainerController::class);
    Route::resource('groups', GroupController::class);
    Route::get('/reports', function () { return view('reports'); })->name('reports');
    Route::resource('timetable', TimetableController::class)->only([
        'index', 'create', 'edit', 'store', 'update','destroy'
    ]);
    Route::resource('applications', ApplicationController::class);
    Route::resource('clients', ClientController::class);
    Route::post('application/{id}', [ApplicationController::class, 'createClient'])->name('applications.createClient');
    Route::resource('services', ServiceController::class);
    Route::resource('subcategories', SubcategoryController::class);
    Route::resource('subscriptions', SubscriptionController::class);
    Route::resource('level_preparations', LvlpreparationController::class);
    Route::resource('services_lists', ServiceslistController::class);

});
