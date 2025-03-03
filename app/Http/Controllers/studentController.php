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


    public function DescricionEstudiante($id)
    {
        $studen = modelstudent::find($id);
        if (!$studen) {
            $data = [
                'message' => 'Estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => $studen,
            'status' => 200
        ];

        return response()->json($data, 200);
    }


    public function EliminarEstudiante($id)
    {
        $student = modelstudent::find($id);
        if (!$student) {
            $data = [
                'message' => 'Estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $student->delete();

        $data = [
            'mesagge' => 'Estudiante eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }


    // actulizar el estudiante 
    public function ActulizarEstudiante(Request $request, $id)
    {
        $estudiante = modelstudent::find($id);
        if (!$estudiante) {
            $data = [
                'message' => 'Estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
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

        $estudiante->name = $request->name;
        $estudiante->email = $request->email;
        $estudiante->phone = $request->phone;
        $estudiante->Curso = $request->Curso;

        $estudiante->save();

        $data = [
            'message' => 'Estudiante actulizado',
            'student' => $estudiante,
            'status',
            200
        ];

        return response()->json($data, 200);
    }


    public function ActulizacionParcial(Request $request, $id)
    {
        $estudiante = modelstudent::find($id);
        if (!$estudiante) {
            $data = [
                'message' => 'Estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validar = validator::make($request->all(), [
            'name' => 'max:100',
            'email' => 'email',
            'phone' => 'digits:10',
            'Curso' => 'max:3'
        ]);
        if ($validar->fails()) {
            $data = [
                'message' => 'Error en la validacion de los datos',
                'Error' => $validar->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        }

        if ($request->has('name')) {
            $estudiante->name = $request->name;
        }
        if ($request->has('email')) {
            $estudiante->email = $request->email;
        }
        if ($request->has('phone')) {
            $estudiante->phone = $request->phone;
        }
        if ($request->has('Curso')) {
            $estudiante->Curso = $request->Curso;
        }

        $estudiante->save();
        $data = [
            'message' => 'Estudiante actulizado',
            'student' => $estudiante,
            'status',
            200
        ];

        return response()->json($data, 200);
    }
}
