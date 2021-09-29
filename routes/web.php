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

Route::get('/guest/input-name', [HomepageController::class, 'createStepOne'])->name('guest.step.one');
Route::post('/guest/input-name', [HomepageController::class, 'postStepOne'])->name('guest.step.one.post');

Route::get('/guest/input-note', [HomepageController::class, 'createStepTwo'])->name('guest.step.two');
Route::post('/guest/input-note', [HomepageController::class, 'postStepTwo'])->name('guest.step.two.post');

Route::get('/guest/input-photo', [HomepageController::class, 'createStepThree'])->name('guest.step.three');
Route::post('/guest/input-photo', [HomepageController::class, 'postStepThree'])->name('guest.step.three.post');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'IsAdmin'], function () {
  Route::get('/admin/home', [AdminController::class, 'admin'])->name('admin.dashboard');
  Route::resource('guest', GuestController::class);
  Route::resource('user', UserController::class);
});
