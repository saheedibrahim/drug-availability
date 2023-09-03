<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DrugAvailableController;
use App\Http\Controllers\PharmacyController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'doctor', 'as' => 'doctor.'], function()
{
    Route::get('signup', [DoctorController::class, 'signupPage'])->name('signup');
    Route::post('signup', [DoctorController::class, 'signup'])->name('signup');
    Route::get('login', [DoctorController::class, 'loginPage'])->name('login');
    Route::post('login', [DoctorController::class, 'login'])->name('login');
    Route::get('home', [DoctorController::class, 'home'])->name('home');
    Route::get('logout', [DoctorController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'pharmacy', 'as' => 'pharmacy.'], function()
{
    Route::get('signup', [PharmacyController::class, 'signuppage'])->name('signup');
    Route::post('signup', [PharmacyController::class, 'signup'])->name('signup');
    Route::get('login', [PharmacyController::class, 'loginpage'])->name('login');
    Route::post('login', [PharmacyController::class, 'login'])->name('login');
    Route::get('home', [PharmacyController::class, 'home'])->name('home');
    Route::get('logout', [PharmacyController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'drug', 'as' => 'drug.'], function() {
    Route::get('register', [DrugAvailableController::class, 'registerPage'])->name('register');
    Route::post('register', [DrugAvailableController::class, 'register'])->name('register');
    Route::get('update', [DrugAvailableController::class, 'updatePage'])->name('update');
    Route::put('update', [DrugAvailableController::class, 'update'])->name('update');
    Route::get('search', [DrugAvailableController::class, 'drugSearch'])->name('search');
    Route::get('buy', [DrugAvailableController::class, 'drugToBuy'])->name('buy');
    Route::put('buy', [DrugAvailableController::class, 'drugBuy'])->name('buy');
});