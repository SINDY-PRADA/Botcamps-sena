<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\CoursesResource;
class CoursesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "success" => true,
            "data" => $this->collection
    ]; 
    }
}
