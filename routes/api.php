<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// import controller
use App\Http\Controllers\StudentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// membuat routing buat students
Route::get('/students', [StudentController::class, 'index']); // get all student
Route::get('/students/{id}', [StudentController::class, 'show']); // get detail student
Route::post('/students', [StudentController::class, 'store']); // menambahkan data student
Route::put('/students/{id}', [StudentController::class, 'update']); // edit data student
Route::delete('students/{id}', [StudentController::class, 'destroy']); // hapus data students