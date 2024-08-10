<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TareaController extends Controller
{
    //validaciones
    public function validar(Request $request)
    {
        $reglas = array(
            'nombre' => 'required|min:5',
            'descripcion' => 'required',
        );
        $validator = Validator::make($request->all(),$reglas);
        if ($validator->fails()) {
            return response()->json([
                "status" => 400,
                "mes" => "los datos ingresados son incorrectos"
                    
            ]);
        }
        return true;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //consultar tabla para listar filas
        $tareas = Tarea::all();
        return response()->json(
            [
                "status" => 200,
                "data" => $tareas

            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Guardar datos en la base de datos
        $tareas = Tarea::create($request->all());
        
        return response()->json(
            [
                "status" => 201,
                "message" => "Tarea creada exitosamente",
                "data" => $tareas

            ]
        );

    }

    /**
     * Display the specified resource.
     */
    public function show( $id_tarea)
    {
        //ver una tarea
        $tarea = Tarea::find($id_tarea);
        if (!$tarea) {
            return response()->json(
                [
                    "status" => 404,
                    "message" => "Tarea no encontrada"
                    

                ]
            );
        }
        return response()->json(
            [
                "status" => 200,
                "data" => $tarea
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_tarea)
    {
        //funcion para actualizar una tarea
        $tarea = Tarea::find($id_tarea);
        $tarea->update($request->all());
        return response()->json(
            [
                "status" => 200,
                "message" => "Tarea actualizada exitosamente",
                "data" => $tarea

            ]
        );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request, $id_tarea)
    {
        // eliminar una tarea
        $tarea = Tarea::find($id_tarea);
        $tarea->delete();
        return response()->json(
            [
                "status" => 200,
                "message" => "Tarea eliminada exitosamente"

            ]
        );
    }
}
