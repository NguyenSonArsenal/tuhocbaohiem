<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\TeacherController;
use App\Http\Controllers\Backend\UserController;
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

Route::get('/', function () {
    dd('Tu hoc bao hiem');
});

Route::group(['prefix'=>'/', 'as'=>'fe.'], function(){
});


// ========== BACKEND AREA ==========
Route::group(['prefix'=>'management/', 'as'=>'be.', 'namespace' => 'Backend'], function(){
    Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
    Route::post('login', [AuthController::class, 'postLogin'])->name('login.post');

    Route::group(['middleware' => ['authBackend']], function () {
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // ========== Module User ==========
        Route::group(['prefix' => 'user/', 'as' => 'user.'], function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::post('/update', [UserController::class, 'update'])->name('update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'user/', 'as' => 'user.'], function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::post('/update', [UserController::class, 'update'])->name('update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
        });

        Route::resource('teacher', '\App\Http\Controllers\Backend\TeacherController');

//        Route::group(['prefix'=>'teacher/', 'as'=>'teachers.'], function(){
//
//            Route::get('/', ['as' => 'list', 'uses' => 'Backend\TeacherController@index']);
//
//            Route::get('/create', ['as' => 'create', 'uses' => 'Backend\TeacherController@create']);
//
//            Route::post('/', ['as' => 'store', 'uses' => 'Backend\TeacherController@store']);
//
//            Route::get('/{id}/edit', ['as' => 'edit', 'uses' => 'Backend\TeacherController@edit']);
//
//            Route::post('/{id}', ['as' => 'update', 'uses' => 'Backend\TeacherController@update']);
//
//            Route::delete('/{id}', ['as' => 'destroy', 'uses' => 'Backend\TeacherController@destroy']);
//        });
    });
});
