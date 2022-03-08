<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GetProductListController;
use App\Http\Controllers\CustomerController;
use App\Models\Post;
use App\Models\User;
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
Route::resource('posts', PostController::class)->only([
    'destroy', 'show', 'store', 'update'
 ]);
Route::resource('product', GetProductListController::class)->only([
    'index'
]);
Route::get('/products', function(){
    return Post::all();
});
Route::get('/users', function(){
    return User::all();
});
Route::get('/userInfo', function(Request $request){
    $id = $request->input('_id');
    $result = User::where('_id','=',$id)->get();
    return $result;
});
Route::get('/customer', [CustomerController::class, 'index']);
/*
Route::post('/userCreate', function(Request $request){
    $create = User::create()
});
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
