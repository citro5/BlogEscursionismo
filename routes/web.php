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
Route::get('/escursione',[EscursioneController::class,'index'])->name('escursione.index');
Route::get('/escursione/info/{id}', [EscursioneController::class, 'info'])->name('escursione.info');
Route::get('/escursione/filterSort',[EscursioneController::class, 'filterSort'])->name('escursione.filterSort');
Route::get('/difficoltà', [EscursioneController::class, 'difficulty'])->name('difficoltà');
Route::get('/mappa', [EscursioneController::class, 'viewMap'])->name('mappa');

/* Rotte per l'autenticazione */ 
Route::get('/user/login',[AuthController::class, 'authentication'])-> name('user.login');
Route::post('/user/login',[AuthController::class, 'login'])->name('user.login');
Route::post('/user/register',[AuthController::class, 'registration'])->name('user.register');
Route::get('/user/logout',[AuthController::class, 'logout'])->name('user.logout');
Route::get('/registrationEmailCheck', [AuthController::class, 'registrationCheckForEmail']);
Route::get('/registrationUsernameCheck',[AuthController::class,'registrationCheckForUsername']);

/* Rotte per utente registrato */
Route::middleware(['authCustom'])->group(function(){
    //Route::resource('escursione', EscursioneController::class);
    Route::get('/escursione/create',[EscursioneController::class, 'create'])->name('escursione.create');
    Route::put('/escursione/{id}',[EscursioneController::class, 'update'])->name('escursione.update');
    Route::post('/escursione',[EscursioneController::class, 'store'])->name('escursione.store');
    Route::get('/escursione/{id}/edit',[EscursioneController::class, 'edit'])->name('escursione.edit');
    Route::get('/escursione/{id}/destroy', [EscursioneController::class, 'destroy'])->name('escursione.destroy');
    Route::get('/escursione/{id}/destroy/confirm', [EscursioneController::class, 'confirmDestroy'])->name('escursione.destroy.confirm');
    Route::get('/getDifficulty', [EscursioneController::class,'getDifficolta']);
    Route::post('/escursione/commento', [EscursioneController::class, 'addCommento'])->name('escursione.commento');
    Route::post('/escursione/commento/{id}', [EscursioneController::class, 'removeCommento'])->name('escursione.removeComment');
});

