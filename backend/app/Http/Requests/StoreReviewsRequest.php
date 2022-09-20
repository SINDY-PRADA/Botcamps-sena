<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreReviewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        {
            return [
                "title" => "required|min:5",
                "rating" => "required",
                "user_id" => "exists:users,id",
    
            ];
        }
    
        /*
        * enviar respuesta en caso de 
        * validacion fallida
        */
    
    }
    protected function failedValidation(Validator $v){
        //lanzar una excepcion HttpResponse en caso
        //de errores ded validacion 
        throw new HttpResponseException( response()->json([
                                                    "success"=> false,
                                                    "errors"=> $v->errors()
                                                ], 422) );

    }
}
