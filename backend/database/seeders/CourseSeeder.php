<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
       //1. Leer el archivo de datos 
       $json=File::get('database/_data/courses.json');
       //2. convertir los datos en un arreglo
       $arreglo_course = json_decode($json);
       //3. recorrer el areglo
       //var_dump($arreglo_usuarios);
       foreach($arreglo_course as $course)
           //4. registrar el usuario en base de datos
           // se utiliza el metodo ::create
           Course::create([
           "tatle" => $course->tatle,
           "description" => $course->description,
           "weeks" => $course->weeks,
           "enroll_cost" => $course->enroll_cost,
           "minimum_skill" => $course->minimum_skill
     
           ]);
    }
}
