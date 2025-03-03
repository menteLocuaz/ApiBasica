<?php

use App\Http\Controllers\studentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/estudiante', [studentController::class, 'listar']);

Route::post('/estudiante', [studentController::class, 'CrearStudiante']);

Route::get('/estudiante/{id}', [studentController::class, 'DescricionEstudiante']);

Route::put('/estudiante/{id}', [studentController::class, 'ActulizarEstudiante']);


Route::delete('/estudiante/{id}', [studentController::class, 'EliminarEstudiante']);
