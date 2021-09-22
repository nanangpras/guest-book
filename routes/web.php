<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GuestController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomepageController;
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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/clear-cache', function () {
  Artisan::call('config:clear');
  Artisan::call('cache:clear');
  Artisan::call('config:cache');
  return 'DONE';
});

Route::get('/', [HomepageController::class, 'index'])->name('home.wedding');
Route::get('/alert', [HomepageController::class, 'alert'])->name('alert');
Route::post('/guest/insert', [HomepageController::class, 'createImageFromBase64'])->name('guest.insert');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'IsAdmin'], function () {
  Route::get('/admin/home', [AdminController::class, 'admin'])->name('admin.dashboard');
  Route::resource('guest', GuestController::class);
  Route::resource('user', UserController::class);
});
