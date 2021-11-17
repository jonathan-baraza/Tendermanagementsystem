<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaypalController;



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
    return redirect('/home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/base',function(){
	return view('master/base');
});
Route::get('/home',[TenderController::class,'homepage'])->name('homepage');

Route::get('/admin',function(){
	return view('customAuths/admin-register');
});
Route::get('/officer',function(){
	return view('customAuths/ict-officer-register');
});
Route::get('/panelist',function(){
	return view('customAuths/panelist-register');
});


Route::get('/logout',[LogoutController::class,'logout']);

Route::get('/about',function(){
	return view('about');
})->name('about');

Route::get('/profile/{id}',[ProfileController::class,'showProfile'])->middleware('auth')->name('profilePage');
Route::post('/update-theme',[ProfileController::class,'updateTheme'])->middleware('auth')->name('updateTheme');
Route::post('/update-profile',[ProfileController::class,'updateProfile'])->middleware('auth')->name('updateProfile');

Route::get('/manage-users',[UserController::class,'allUsers'])->middleware('auth')->name('manageUsers');
Route::get('/change-status/{id}',[UserController::class,'changeUserStatus'])->middleware('auth')->name('changeUserStatus');

Route::get('/add-tender',[TenderController::class,'addTenderForm'])->name('addTenderForm')->middleware('auth');
Route::post('/insert-new-tender',[TenderController::class,'addTender'])->name('addNewTender')->middleware('auth');
Route::get('/edit-tender/{id}',[TenderController::class,'editTender'])->name('editTender')->middleware('auth');
Route::post('/update-tender',[TenderController::class,'updateTender'])->middleware('auth')->name('updateTender');
Route::get('/delete-tender-form/{id}',[TenderController::class,'confirmDeleteTenderForm'])->name('confirmDeleteTenderForm')->middleware('auth');
Route::get('/delete-tender/{id}',[TenderController::class,'deleteTender'])->name('deleteTender')->middleware('auth');

Route::get('/process-payment/{id}/tenderid/{tenderid}',[PaypalController::class,'getOrder'])->middleware('auth')->name('getOrder');

Route::post('/apply-tender',[TenderController::class,'applyTender'])->name('applyTender');




