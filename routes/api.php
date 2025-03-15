<?php
// dd('api.php is loading!');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\AssignmentController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::middleware([])->get('/students', [StudentController::class, 'index']);

Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});

Route::apiResource('students', StudentController::class);

// Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/{id}', [StudentController::class, 'show']);

Route::get('/assignments', [AssignmentController::class, 'index']);
Route::get('/assignments/{id}', [AssignmentController::class, 'show']);