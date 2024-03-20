<?php

use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\DivisiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuLanjutanController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\ProjectMenuController;
use App\Http\Controllers\RevisiGambarController;
use App\Http\Controllers\ToolsController;
use App\Models\Project_menu;

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

Route::redirect('/', '/login');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login-proses',[LoginController::class,'Login'])->name('login-proses');

Route::group(['middleware' => 'login'], function () {
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/projectmenu', ProjectMenuController::class);
    Route::resource('/menulanjutan', MenuLanjutanController::class);
    Route::resource('/tools', ToolsController::class);
    Route::resource('/aktivitas', AktivitasController::class);
    Route::resource('/revisigambar', RevisiGambarController::class);
    Route::resource('/notifikasi', NotifikasiController::class);
    Route::resource('/divisi', DivisiController::class);
    Route::get('/logout',[LoginController::class,'Logout'])->name('logout');
});


