<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BootcampController;
use App\Http\Controllers\CoursesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::apiResource('bootcamps' , BootcampController::class);
Route::apiResource('courses', CoursesController::class);
Route::apiResource('review', CoursesController::class);
//Ruta especificaa para creale un curso a un bootcamp 
Route::post("courses/{idbootcamp}/create",
              [CoursesController::class, "store"] 
           );
           Route::post("review/{idbootcamp}/create",
           [ReviewsController::class, "store"] 
        );
