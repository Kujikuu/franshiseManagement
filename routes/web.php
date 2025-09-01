<?php

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::group(['prefix' => '/',], function () {
    Route::get('/test', [App\Http\Controllers\HomeController::class, 'test']);

    Route::get('/', function (){

        return view('welcome');
    });

});


Route::get('/register/franchisor', [App\Http\Controllers\UserController::class, 'register_franchisor']);

Route::post('/register_franchisor', [App\Http\Controllers\UserController::class, 'store_franchisor'])->name('register.franchisor');

Route::get('/register/operator', [App\Http\Controllers\UserController::class, 'register_operator'])->name('register.operator');

Route::group(['prefix' => '/dashboard', 'middleware'=> ['auth']], function () {

    Route::get('/' , [\App\Http\Controllers\HomeController::class , 'dashboard'])->name('dashboard');

    Route::get('/myfranchise' , [\App\Http\Controllers\HomeController::class , 'myfranchise'])->name('myfranchise');

    Route::get('/performance' , [\App\Http\Controllers\HomeController::class , 'performance'])->name('performance');

    Route::get('/royalty' , [\App\Http\Controllers\HomeController::class , 'royalty'])->name('royalty');


    Route::group(['prefix' => 'users' ], function () {
        Route::post('/add', [App\Http\Controllers\UserController::class, 'create'])->name('user.add');

        Route::get('/balance', [App\Http\Controllers\UserController::class, 'balance'])->name('balance');

        Route::post('/balance/store', [App\Http\Controllers\UserController::class, 'store_balance'])->name('balance.store');

        Route::get('/{type}/view', [App\Http\Controllers\UserController::class, 'index'])->name('users');

        Route::get('/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');

        Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

        Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');

        Route::post('/store_franchisee', [App\Http\Controllers\UserController::class, 'store_franchisee'])->name('user.store.franchisee');

        Route::post('/update_password', [App\Http\Controllers\UserController::class, 'update_password'])->name('user.password.update');

        Route::get('/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete');
    });

    Route::group(['prefix' => 'units' ], function () {
        Route::get('/', [App\Http\Controllers\UserController::class, 'units'])->name('units');

        Route::get('/{id}/view', [App\Http\Controllers\UserController::class, 'units_show'])->name('units.show');

    });

    Route::group(['prefix' => 'tasks' ], function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'tasks'])->name('tasks');


    });


    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');

        Route::post('/', [App\Http\Controllers\UserController::class, 'update'])->name('update.user.info');
    });

    Route::group(['prefix' => 'technical_requests' ], function () {
        Route::get('/', [App\Http\Controllers\TechnicalRequestController::class, 'index'])->name('technical_requests');

        Route::post('/', [App\Http\Controllers\TechnicalRequestController::class, 'store'])->name('technical_request.store');

        Route::get('/delete/{id}', [App\Http\Controllers\TechnicalRequestController::class, 'destroy'])->name('technical_request.delete');
    });

    Route::group(['prefix' => 'associates' ], function () {
        Route::get('/', [App\Http\Controllers\AssociateController::class, 'index'])->name('associates');

        Route::post('/store', [App\Http\Controllers\AssociateController::class, 'store'])->name('associate.store');

        Route::get('/delete/{id}', [App\Http\Controllers\AssociateController::class, 'destroy'])->name('associate.delete');
    });

    Route::group(['prefix' => 'leads' ], function () {
        Route::get('/', [App\Http\Controllers\LeadController::class, 'index'])->name('leads');

        Route::post('/store', [App\Http\Controllers\LeadController::class, 'store'])->name('lead.store');

        Route::get('/delete/{id}', [App\Http\Controllers\LeadController::class, 'destroy'])->name('lead.delete');
    });

    Route::group(['prefix' => 'operators' ], function () {
        Route::get('/', [App\Http\Controllers\BusinessController::class, 'index'])->name('operators');

        Route::get('/{id}', [App\Http\Controllers\BusinessController::class, 'show'])->name('operator.show');

        Route::post('/store', [App\Http\Controllers\UserController::class, 'update_business'])->name('operator.store');

        Route::get('/delete/{id}', [App\Http\Controllers\BusinessController::class, 'destroy'])->name('operator.delete');
    });

    Route::group(['prefix' => 'accounts' ], function () {
        Route::get('/', [App\Http\Controllers\AccountController::class, 'index'])->name('accounts');

        Route::post('/store', [App\Http\Controllers\AccountController::class, 'store'])->name('account.store');

        Route::get('/delete/{id}', [App\Http\Controllers\AccountController::class, 'destroy'])->name('account.delete');
    });

    Route::group(['prefix' => 'collections' ], function () {

        Route::get('/', [App\Http\Controllers\CollectionController::class, 'index'])->name('collections');

        Route::get('/{id}/pay', [App\Http\Controllers\CollectionController::class, 'pay'])->name('collection.pay');

        Route::post('/store', [App\Http\Controllers\CollectionController::class, 'store'])->name('collection.store');

        Route::get('/delete/{id}', [App\Http\Controllers\CollectionController::class, 'destroy'])->name('collection.delete');
    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');

        Route::post('/', [App\Http\Controllers\UserController::class, 'update'])->name('update.user.info');
    });

    Route::group(['prefix' => 'plans', 'middleware'=> ['admin']], function () {
        Route::get('/', [App\Http\Controllers\PlanController::class, 'index'])->name('plans');

        Route::post('/', [App\Http\Controllers\PlanController::class, 'store'])->name('plan.store');

        Route::get('/delete/{id}', [App\Http\Controllers\PlanController::class, 'destroy'])->name('plan.delete');
    });

});
