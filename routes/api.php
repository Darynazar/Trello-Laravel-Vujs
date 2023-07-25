<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\BoardListController;
use App\Http\Controllers\CardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['api']], function () {
    //dashboard show all board thats for users
    Route::get('/dashboard', [BoardController::class, 'index'])->name('dashboard');
    //board Shows
    Route::get('/boards/{board}', [BoardController::class, 'show'])->name('boards.show');
    //store board
    Route::post('/board', [BoardController::class, 'store'])->name('boards.store');
    //board Update
    Route::put('/boards/{board}', [BoardController::class, 'update'])->name('boards.update');

    //store list
    Route::post('/boards/{board}/lists', [BoardListController::class, 'store'])
        ->name('boardList.store');
    //update list
    Route::put('/boardList/{list}', [BoardListController::class, 'update'])
        ->name('boardList.update');

    //store card
    Route::post('/cards', [CardController::class, 'store'])->name('cards.store');
    //update card
    Route::put('/cards/{card}', [CardController::class, 'update'])->name('cards.update');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});
