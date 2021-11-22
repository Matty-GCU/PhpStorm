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

//Laravel欢迎页面
//Route::get('/', function () {
//    return view('welcome');
//});

//临时主页
Route::get('/', function() {
    return redirect('/db');
});
Route::get('/db', [\App\Http\Controllers\CRUDController::class, 'index']);
Route::get('/db/addStu', function () {
    return view('addStu');
});
Route::get('/db/deleteStu', function () {
    return view('deleteStu');
});
Route::get('/db/updateStu', function () {
    return view('updateStu');
});
Route::get('/db/searchStu', function () {
    return view('searchStu');
});
Route::get('/db/doInsert', [\App\Http\Controllers\CRUDController::class, 'doInsert']);
Route::get('/db/doDelete', [\App\Http\Controllers\CRUDController::class, 'doDelete']);
Route::get('/db/doUpdate', [\App\Http\Controllers\CRUDController::class, 'doUpdate']);
Route::get('/db/doSearch', [\App\Http\Controllers\CRUDController::class, 'doSearch']);
