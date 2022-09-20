<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CoursesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //diseñar el encapsulado de 
     //nuestra entidad
     return[
        'title' =>Str::upper($this->title),
        'id' => $this->id ,
        'description'=>$this->description
     ];
    }
}
