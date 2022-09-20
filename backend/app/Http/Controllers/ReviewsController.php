<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Review;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StroreReviewsRequest;
use App\Http\Resources\ReviewaResource;
use App\Http\Resources\ReviewaCollection;

class ReviewsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //echo "aquí se va a mostrar  todos los bootcamp";
       return response()->json( new ReviewaCollection(Review::all())
                                , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StroreReviewsRequest $request)
    {

        $review = new Review();
        $review->title =$request->title;
        $review->text =$request->text;
        $review->rating=$request->rating;
        $review->bootcamp_id= $id;
        $review->save();

        //enviar response
        return response()->json([
            "success"=> true,
            "data"=> $review
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
                            "data"=>Review::find($id)
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
        $reviews = Review::find($id);
        //2. Actualizarlo
        $reviews->update(
            $request->all()
        );
        //3. Hacer el Response
        return response()->json( ["success" => true ,
                                "data" => new ReviewaResource ($reviews)
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
       $reviews = Review::find($id);
       //2. Eliminar ese bootcamp
       $reviews->delete();
       //3. Response:
       return response()->json( ["success" => true,
                                "message" => "Review",
                                "data"=>new ReviewaResource ($reviews)  ] , 200);
       
    }
}
