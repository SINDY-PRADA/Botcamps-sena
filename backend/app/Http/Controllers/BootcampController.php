<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StroreBootcampRequest;
use App\Http\Resources\BootcampResource;
use App\Http\Resources\BootcampCollection;


class BootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //echo "aquí se va a mostrar  todos los bootcamp";
       return response()->json( new BootcampCollection(Bootcamp::all())
                                , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StroreBootcampRequest $request)
    {

       //verificar que llegó aquí el payload
       //return $request->all();
       //registrar el bootcamp a partir del payload

       $b = Bootcamp::create(
        $request->all()
        );
        return response( ["success" => true,
                        "data"=> $b ] , 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json( ["success" => true,
                            "data"=>Bootcamp::find($id)
        ] , 200);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //1. Seleccionar el bootcamp por id
        $bootcamp = Bootcamp::find($id);
        //2. Actualizarlo
        $bootcamp->update(
            $request->all()
        );
        //3. Hacer el Response
        return response()->json( ["success" => true ,
                                "data" => new BootcampResource ($bootcamp)
                                ] , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //1. Seleccionar el bootcamp
       $bootcamp = Bootcamp::find($id);
       //2. Eliminar ese bootcamp
       $bootcamp->delete();
       //3. Response:
       return response()->json( ["success" => true,
                                "message" => "Bootcamp",
                                "data"=>new BootcampResource ($bootcamp)  ] , 200);
       
    }
}
