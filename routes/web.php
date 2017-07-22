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

Auth::routes();

// 公開ページindex
Route::name('index')
    ->get('/', 'BooksController@home');
Route::name('index')
    ->get('/home', 'BooksController@home');

// 公開ページdescription
Route::name('description')
    ->get('/description/{books}', 'BooksController@description');

// 新本追加画面
Route::get('/store', 'BooksController@store');

// 新本追加
Route::post('/create', 'BooksController@create');

// 編集画面
Route::post('/edit/{books}', 'BooksController@edit');

// データの更新
Route::post('/update', 'BooksController@update');

// 本の削除
Route::delete('/delete/{book}', 'BooksController@destroy');