<?php

use App\Http\Controllers\TareaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/tareas', function(Request $request){
//     echo "hola";
// });
Route::get('/tareas',[TareaController::class, 'index']);
Route::get('/tareas/{id}',[TareaController::class, 'show']);
Route::post('/tareas',[TareaController::class, 'store']);
Route::put('/tareas/{id}',[TareaController::class, 'update']);
Route::delete('/tareas/{id}',[TareaController::class, 'delete']);


