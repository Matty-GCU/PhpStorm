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

Route::get('/controllerTest', [\App\Http\Controllers\ControllerTest::class, 'getAuthName']);
Route::get('/controllerTest/sayHello/{userName}', [\App\Http\Controllers\ControllerTest::class, 'sayHello'])
    ->where('userName', '[0-9]+');

Route::get('/hello', function () {
    return 'Hello Laravel!(v2)';
});

Route::get('/hello/{userName}', function ($name) {
    return 'Hello Laravel!(v2)'.$name;
})
    ->where('userName', '[0-9]+');

//Route::redirect('/', '/hello', '301');
//Route::redirect('/', '/hello', '302');
//Route::permanentRedirect('/', '/hellp');

Route::get('/db/select', [\App\Http\Controllers\DBController::class, "select"]);
//Route::get('/db/select', 'DBController@select');
//Route::get('/db/StuRegister', function() {
//    return redirect('/FormTest.html');
//});
