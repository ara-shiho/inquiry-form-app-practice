<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactController;

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

Route::get('/hello', function () {
    return response()->json([
        'message' => 'Hello, World!'
    ]);
});

Route::post('/login', [ContactController::class, 'login'])->name('api.login');

Route::middleware(['auth:sanctum', 'verified'])->name('api.')->group(function () {
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::post('/contacts/confirm', [ContactController::class, 'confirm'])->name('contacts.confirm');
    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/contacts/thanks', [ContactController::class, 'thanks'])->name('contacts.thanks');
    Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
    Route::post('/logout', [ContactController::class, 'logout'])->name('logout');
});


