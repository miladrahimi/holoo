<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\TransactionsController;
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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'getSignIn'])->name('auth.sign-in');
    Route::post('/', [AuthController::class, 'postSignIn'])->name('auth.sign-in');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/contacts', [ContactsController::class, 'index'])
        ->name('contacts.index');
    Route::post('/contacts', [ContactsController::class, 'store'])
        ->name('contacts.store');
    Route::get('/contacts/{contact}/transactions', [TransactionsController::class, 'index'])
        ->name('contacts.transactions.index');
    Route::post('/contacts/{contact}/transactions', [TransactionsController::class, 'store'])
        ->name('contacts.transactions.store');
});
