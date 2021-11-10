<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/controllerTest', [\App\Http\Controllers\ControllerTestPHPClass::class, 'FunctionTest']);

//也可以写成'hello'
Route::get('/hello', function () {
    return 'Hello Laravel!';
});

Route::get('/hello{who}', function ($who) {

});
