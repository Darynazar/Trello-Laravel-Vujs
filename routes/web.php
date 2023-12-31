<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\BoardListController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
//
//Route::group(['middleware' => ['auth', 'verified']], function() {
//    Route::get('/boards/{board}', [BoardController::class, 'show'])->name('boards.show');
//
//    Route::put('/boards/{board}', [BoardController::class, 'update'])->name('boards.update');
//
//    Route::get('/dashboard', [BoardController::class, 'index'])->name('dashboard');
//    Route::post('/board', [BoardController::class, 'store'])->name('boards.store');
//
//    Route::post('/boards/{board}/lists', [BoardListController::class, 'store'])
//              ->name('boardList.store');
//
//    Route::post('/cards', [CardController::class, 'store'])->name('cards.store');
//    Route::put('/cards/{card}', [CardController::class, 'update'])->name('cards.update');
//
//});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
