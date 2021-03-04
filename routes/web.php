<?php


use App\Http\Controllers\SecretaryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Pusher\Pusher;

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

    Route::get('/society/approvemember/{user_id}', [SecretaryController::class,'approve'])->name('society.approvemember');
    Route::get('/society/rejectmember/{user_id}', [SecretaryController::class,'reject'])->name('society.rejectmember');
    Route::get('/society/needapprove', [SecretaryController::class,'needapprovemembers'])->name('society.needapprove');
    Route::get('/society/rule', function (){
        return view('society.rule');
    })->name('society.rule');

    Route::post('/society/rule', [SecretaryController::class,'add_rule'])->name('society.rule');
    Route::get('/society/all_rule', [SecretaryController::class,'show_rule'])->name('society.all_rule');
    Route::get('/society/delete_rule/{id}', [SecretaryController::class,'delete_rule'])->name('society.delete_rule');
    Route::get('/society/edit_rule/{id}', [SecretaryController::class,'edit_rule'])->name('society.edit_rule');
    Route::put('/society/update_rule', [SecretaryController::class,'update_rule'])->name('society.update_rule');
});

Route::group(['middleware' => ['auth'] ], function(){

    Route::middleware(['approved'])->group(function () {
        Route::get('/member',[MemberController::class,'index'])->name('member.home');
        Route::get('/member/approval',[MemberController::class,'approve'])->name('member.approval');
    });
});

Route::get('/login/society',[LoginController::class,'show_login'])->name('login.society');
Route::post('/login/society',[LoginController::class,'check_login'])->name('login.society');
Route::get('/register/society',[LoginController::class,'show_register'])->name('register.society');
Route::post('/register/society',[LoginController::class,'create_society'])->name('register.society');

Route::get('/login/member',[LoginController::class,'show_login'])->name('login.member');
Route::post('/login/member',[LoginController::class,'check_login'])->name('login.member');
Route::get('/register/member',[LoginController::class,'show_register'])->name('register.member');
Route::post('/register/member',[LoginController::class,'create_member'])->name('register.member');

Route::get('/logout',[LoginController::class,'destroy'])->name('logout');

Route::get('/country', function () {
    $country = Storage::get('public/country.json');
    return json_decode($country, true);
});
