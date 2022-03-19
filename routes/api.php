<?php
use App\Http\Controllers\API\Authcontroller;
use App\Http\Controllers\API\Menucontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login',[Authcontroller::class,'login']);
Route::group(['middleware'=>'auth:sanctum'],function(){

    //Route::resource('menu',Menucontroller::class);
    Route::resource('menu',Menucontroller::class);
    Route::post('/menu/{id}',[Menucontroller::class,'update']);

});
 
 
