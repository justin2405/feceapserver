<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/post/{slug}', [PostController::class, 'show']);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
$router->get('/', function () use ($router) {
    return $router->app->version();
});
*/
$router->group(['prefix' => 'api'], function () use ($router) {
  $router->get('customer',  ['uses' => 'CustomerController@showAllCustomers']);

  $router->get('customer/{id}', ['uses' => 'CustomerController@showOneCustomer']);

  $router->post('customer', ['uses' => 'CustomerController@create']);

  $router->delete('customer/{id}', ['uses' => 'CustomerController@delete']);

  $router->put('customer/{id}', ['uses' => 'CustomerController@update']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
