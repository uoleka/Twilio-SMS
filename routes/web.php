<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Smshandler;
use App\Http\Livewire\Smsshow;

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
});


Route::group(['prefix' => '/', 'middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('sms', Smshandler::class)->name('message');
    Route::get('sms_show', Smsshow::class)->name('status');

    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});