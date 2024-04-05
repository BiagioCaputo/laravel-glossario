<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\Admin\WordController;

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

//Rotta home guest
Route::get('/', [GuestHomeController::class, 'index'])->name('guest.home');
Route::get('/words/{word}', [GuestHomeController::class, 'show'])->name('guest.words.show');





Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function () {
    //Rotta admin home
    Route::get('/', AdminHomeController::class)->name('home');

    //Rotte admin post
    Route::get('/words', [WordController::class, 'index'])->name('words.index');
    Route::get('/words/create', [WordController::class, 'create'])->name('words.create');
    Route::get('/words/{word}', [WordController::class, 'show'])->name('words.show');
    Route::post('/words', [WordController::class, 'store'])->name('words.store');
    Route::get('/words/{word}/edit', [WordController::class, 'edit'])->name('words.edit');
    Route::put('/words/{word}', [WordController::class, 'update'])->name('words.update');
    Route::delete('/words/{word}', [WordController::class, 'destroy'])->name('words.destroy');

    // Rotta admin link
    Route::get('/links', [LinkController::class, 'index'])->name('links.index');
    Route::get('/links/create', [LinkController::class, 'create'])->name('links.create');
    Route::post('/links', [LinkController::class, 'store'])->name('links.store');
    Route::get('/links/{word}/edit', [LinkController::class, 'edit'])->name('links.edit');
    Route::put('/links/{word}', [LinkController::class, 'update'])->name('links.update');
    Route::delete('/links/{word}', [LinkController::class, 'destroy'])->name('links.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
