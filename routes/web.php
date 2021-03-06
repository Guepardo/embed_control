<?php

use App\Http\Controllers\Console\SettingsController;
use App\Http\Controllers\Console\StreamPointActiveController;
use App\Http\Controllers\Console\StreamPointsController;
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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('stream_points', StreamPointsController::class);
    Route::resource('stream_point_active', StreamPointActiveController::class)->only(['destroy', 'store']);
    Route::resource('settings', SettingsController::class)->only(['index', 'update']);
});
