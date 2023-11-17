<?php

use App\Models\Employees;
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

Route::get('/employees', [EmployeesController::class, 'index']);
// Method GET

// Method POST
Route::post('/employees', [EmployeesController::class, 'store']);

// Method PUT
Route::put('/employees/{id}', [EmployeesController::class, 'update']);

// Method DELETE
Route::delete('/employees/{id}', [EmployeesController::class, 'destroy']);

// Method search
Route::get('/search', [EmployeesController::class, 'search']);

// Method active
Route::get('/active', [EmployeesController::class, 'Active']);

// Method inactive
Route::get('/inactive', [EmployeesController::class, 'inactive']);

// Method terminated
Route::get('/terminated', [EmployeesController::class, 'terminated']);

