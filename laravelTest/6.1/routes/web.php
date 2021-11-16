<?php

use Illuminate\Support\Facades\Route;
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

//列表
Route::get('/','ListArticleController@index')->name('index');
//文章
Route::get('/item','ListArticleController@item')->name('item');

//删除
Route::get('/delete_index','ListArticleController@delete_index')->name('delete_index');
Route::get('/delete','ListArticleController@delete')->name('delete');

//编辑器
Route::get('/editor','SendArticleController@index')->name('editor.index');
Route::post('/editor','SendArticleController@submit')->name('editor.submit');
