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
//
//Route::get('/', function () {
//    dd('Tu hoc bao hiem');
//});

Route::group(['as'=>'fe.'], function(){
    Route::get('/dang-nhap', [\App\Http\Controllers\Frontend\AuthController::class, 'login'])->name('login');
    Route::post('/dang-nhap', [\App\Http\Controllers\Frontend\AuthController::class, 'postLogin'])->name('login.post');
    Route::get('/dang-ki', [\App\Http\Controllers\Frontend\AuthController::class, 'register'])->name('register');
    Route::post('/dang-ki', [\App\Http\Controllers\Frontend\AuthController::class, 'postRegister'])->name('register.post');

    Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'home'])->name('home');
    Route::get('/lien-he', [\App\Http\Controllers\Frontend\HomeController::class, 'contact'])->name('contact');
    Route::post('/lien-he', [\App\Http\Controllers\Frontend\HomeController::class, 'postContact'])->name('contact.post');
    Route::get('/giao-vien', [\App\Http\Controllers\Frontend\HomeController::class, 'teacher'])->name('teacher');
    Route::get('/giao-vien/{id}', [\App\Http\Controllers\Frontend\HomeController::class, 'showTeacher'])->name('teacher.show');
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

        Route::resource('teacher', '\App\Http\Controllers\Backend\TeacherController');
    });
});
