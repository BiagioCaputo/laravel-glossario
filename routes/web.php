<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\Admin\WordController;
use App\Http\Controllers\Admin\TagController;

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

    //Rotte admin words trash
    Route::get('/words/trash', [WordController::class, 'trash'])->name('words.trash');
    Route::patch('/words/{word}/restore', [WordController::class, 'restore'])->name('words.restore');
    Route::delete('/words/{word}/drop', [WordController::class, 'drop'])->name('words.drop');


    //Rotte admin words
    Route::get('/words', [WordController::class, 'index'])->name('words.index');
    Route::get('/words/create', [WordController::class, 'create'])->name('words.create');
    Route::get('/words/{word}', [WordController::class, 'show'])->name('words.show')->withTrashed();
    Route::post('/words', [WordController::class, 'store'])->name('words.store');
    Route::get('/words/{word}/edit', [WordController::class, 'edit'])->name('words.edit')->withTrashed();
    Route::put('/words/{word}', [WordController::class, 'update'])->name('words.update')->withTrashed();
    Route::delete('/words/{word}', [WordController::class, 'destroy'])->name('words.destroy');

    //Rotte admin links trash
    Route::get('/links/trash', [LinkController::class, 'trash'])->name('links.trash');
    Route::patch('/links/{link}/restore', [LinkController::class, 'restore'])->name('links.restore');
    Route::delete('/links/{link}/drop', [LinkController::class, 'drop'])->name('links.drop');

    //Rotte admin links
    Route::get('/links', [LinkController::class, 'index'])->name('links.index');
    Route::post('/links', [LinkController::class, 'store'])->name('links.store');
    Route::get('/links/{link}/edit', [LinkController::class, 'edit'])->name('links.edit')->withTrashed();
    Route::put('/links/{link}', [LinkController::class, 'update'])->name('links.update')->withTrashed();
    Route::delete('/links/{link}', [LinkController::class, 'destroy'])->name('links.destroy');


    //Rotte admin tags trash
    Route::get('/tags/trash', [TagController::class, 'trash'])->name('tags.trash');
    Route::patch('/tags/{tag}/restore', [TagController::class, 'restore'])->name('tags.restore');
    Route::delete('/tags/{tag}/drop', [TagController::class, 'drop'])->name('tags.drop');

    //Rotte admin tags
    Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
    Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit')->withTrashed();
    Route::put('/tags/{tag}', [TagController::class, 'update'])->name('tags.update')->withTrashed();
    Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
