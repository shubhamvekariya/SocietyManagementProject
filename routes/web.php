<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    return view('welcome');
})->name('Home');

Route::group(['middleware' => ['auth:society'] ], function(){
    Route::get('/society',  function () {
        return view('society.index');
    })->name('society.home');
});

Route::get('/login/society',[LoginController::class,'show_login'])->name('login.society');
Route::post('/login/society',[LoginController::class,'check_login'])->name('login.society');
Route::get('/register/society',[LoginController::class,'show_register'])->name('register.society');
Route::post('/register/society',[LoginController::class,'create_society'])->name('register.society');
Route::get('/logout',[LoginController::class,'destroy'])->name('logout');

Route::get('/country', function () {
    $country = Storage::get('public/country.json');
    return json_decode($country, true);
});