<?php

use App\Http\Controllers\Api\PharmacyController;
use App\Http\Controllers\Api\TurnController;
use App\Http\Controllers\Api\UserController;
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


/*Route::get('Pharmacy',[PharmacyController::class, 'index'])->name('api.v1.Pharmacy.index'); */
Route::get('/Pharmacy',[PharmacyController::class, 'index']); 
// Route::get('/Pharmacy/{id}',[PharmacyController::class, 'show']); 
// Route::post('/Pharmacy', [PharmacyController::class, 'store']);
// Route::put('/Pharmacy/{id}', [PharmacyController::class, 'update']);
// Route::delete('/Pharmacy/{id}',[PharmacyController::class, 'destroy']); 


// Route::get('/Turn',[TurnController::class, 'index']); 
Route::get('/Turn/Pharmacy',[TurnController::class, 'indexPharmacy']); 
// Route::get('/Turn/{id}',[TurnController::class, 'show']); 
// Route::post('/Turn', [TurnController::class, 'store']);
// Route::put('/Turn/{id}', [TurnController::class, 'update']);
// Route::delete('/Turn/{id}',[TurnController::class, 'destroy']); 


// Route::get('/users', [UserController::class, 'index']);
// Route::get('/users/{id}', [UserController::class, 'show']);
// Route::post('/users', [UserController::class, 'store']);
// Route::put('/users/{id}', [UserController::class, 'update']);
// Route::delete('/users/{id}', [UserController::class, 'destroy']);
