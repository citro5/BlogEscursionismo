<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\EscursioneController;
use App\Http\Controllers\AuthController;

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
Route::get('/',[FrontController::class, 'getHome'])-> name('home');
Route::get('/user/login',[AuthController::class, 'authentication'])-> name('user.login');
Route::post('/user/login',[AuthController::class, 'login'])->name('user.login');
Route::post('/user/register',[AuthController::class, 'registration'])->name('user.register');
Route::get('/user/logout',[AuthController::class, 'logout'])->name('user.logout');
Route::get('/registrationEmailCheck', [AuthController::class, 'registrationCheckForEmail']);

Route::middleware(['authCustom'])->group(function(){
    Route::resource('escursione', EscursioneController::class);
    Route::get('/escursione/{id}/destroy', [EscursioneController::class, 'destroy'])->name('escursione.destroy');
    Route::get('/escursione/{id}/destroy/confirm', [EscursioneController::class, 'confirmDestroy'])->name('escursione.destroy.confirm');
    Route::get('/escursione/info/{id}', [EscursioneController::class, 'info'])->name('escursione.info');
    Route::get('/difficoltà', [EscursioneController::class, 'difficulty']);
});
//Route::get('/escursione',[EscursioneController::class , 'index']) ->name('escursione.index');

