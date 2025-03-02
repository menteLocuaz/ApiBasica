<?php

use App\Http\Controllers\studentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/estudiante', [studentController::class, 'listar']);

Route::get('/estudiante/{id}', function () {
    return 'obteniewnedo el detalle del estudiante';
});

Route::post('/estudiante', [studentController::class, 'CrearStudiante']);

Route::put('/estudiante/{id}', function () {
    return 'actulizar datos del estudiante ';
});

Route::delete('/estudiante/{id}', function () {
    return 'Eliminar estudiante';
});
