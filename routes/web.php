<?php

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

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index'])->name('home');

Route::get('upload', [\App\Http\Controllers\UploadController::class, 'create'])->name('upload')->middleware('auth');
Route::post('upload', [\App\Http\Controllers\UploadController::class, 'store'])->name('upload')->middleware('auth');

Route::get('i/{media}', [\App\Http\Controllers\MediaController::class, 'show'])->name('media.show');
Route::get('d/{media}', [\App\Http\Controllers\MediaController::class, 'display'])->name('media.display');
Route::get('dl/{media}', [\App\Http\Controllers\MediaController::class, 'download'])->name('media.download');
Route::get('m/{media}/delete', [\App\Http\Controllers\MediaController::class, 'destroy'])->name('media.delete');
Route::post('m/{media}/favorite', [\App\Http\Controllers\LikeController::class, 'toggle'])->name('media.favorite')->middleware('auth');



Route::get('u/{user}', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile');

Auth::routes();

Route::get('admin', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');;
//Route::get('api/admin/graph', [\App\Http\Controllers\Admin\DashboardController::class, 'graph'])->name('admin.graph')->middleware('auth');;

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
