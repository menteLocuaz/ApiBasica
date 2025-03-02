<?php

use App\Http\Controllers\studentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/estudiante', [studentController::class, 'listar']);

Route::get('/estudiante/{id}', function () {
    return 'obteniewnedo el detalle del estudiante';
});

Route::post('/estudiante', [studentController::class, 'CrearStudiante']);

Route::get('/estudiante/{id}', [studentController::class, 'DescricionEstudiante']);

Route::put('/estudiante/{id}', function () {
    return 'Eliminar estudiante';
});


Route::delete('/estudiante/{id}', function () {
    return 'Eliminar estudiante';
});
