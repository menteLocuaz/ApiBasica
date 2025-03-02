<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelstudent;
use Illuminate\Support\Facades\Validator;

class studentController extends Controller
{
    public function listar()
    {
        $estudiant = modelstudent::all();

        if ($estudiant->isEmpty()) {
            $data = [
                'Message' => 'No se encontro estuudiante',
                'status' => 200
            ];
            return response()->json($data, 404);
        } else {
            return response()->json($estudiant, 200);
        }
    }


    public function CrearStudiante(Request $request)
    {

        $validar = validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'Curso' => 'required'
        ]);

        if ($validar->fails()) {
            $data = [
                'message' => 'Error en la validacion de los datos',
                'Error' => $validar->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        }

        $studen = modelstudent::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'Curso' => $request->Curso
        ]);

        if (!$studen) {
            $data = [
                'message' => $studen,
                'status' => 500
            ];
            return  response()->json($data, 500);
        }
        $data = [
            'message' => $studen,
            'status' => 201
        ];

        return response()->json($data, 201);
    }
}
