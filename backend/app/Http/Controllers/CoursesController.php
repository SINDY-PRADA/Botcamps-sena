<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

use App\Models\Bootcamp;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreCoursesRequest;
use App\Http\Resources\CoursesResource;
use App\Http\Resources\CoursesCollection;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //echo "aquí se va a mostrar  todos los bootcamp";
       return response()->json( new CoursesCollection(Course::all())
       , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( StoreCoursesRequest $request,$id)
    {


        /*var_dump($request->all());
        echo "<hr />";
        var_dump($id);*/
        //crear curso 
        $curso = new Course();
        $curso->title =$request->title;
        $curso->description =$request->description;
        $curso->weeks=$request->weeks;
        $curso->enroll_cost=$request->enroll_cost;
        $curso->minimum_skill=$request->minimum_skill;
        $curso->bootcamp_id= $id;
        $curso->save();

        //enviar response
        return response()->json([
            "success"=> true,
            "data"=> $curso
        ], 201);
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
                            "data"=>Course::find($id)
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
        $course = Course::find($id);
        //2. Actualizarlo
        $course->update(
            $request->all()
        );
        //3. Hacer el Response
        return response()->json( ["success" => true ,
                                "data" => new CoursesResource ($course)
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
       $course = Course::find($id);
       //2. Eliminar ese bootcamp
       $course->delete();
       //3. Response:
       return response()->json( ["success" => true,
                                "message" => "Course",
                                "data"=>new CoursesResource ($course)  ] , 200);
       
    }
}
