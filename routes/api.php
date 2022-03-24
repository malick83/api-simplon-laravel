<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdeaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::apiResource('idee', IdeaController::class);




Route::post('/register', [AuthController::class, 'register'])->name('register.register');
Route::get('idee/{id}', [IdeaController::class, 'show'])->name('idee.show');
Route::get('idee', [IdeaController::class, 'index'])->name('idee.index');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('idee', [IdeaController::class, 'store'])->name('idee.store');
    Route::put('idee/{id}', [IdeaController::class, 'update'])->name('idee.update');
    Route::delete('idee/{id}', [IdeaController::class, 'destroy'])->name('idee.destroy');
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});