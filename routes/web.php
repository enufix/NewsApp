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
    return redirect('/news');
});

Route::get('news/mostpopular', 'NewsController@mostpopular')->name('news.mostpopular');
Route::patch('news/upvote/{news}', 'NewsController@upvote')->name('news.upvote');
Route::patch('news/downvote/{news}', 'NewsController@downvote')->name('news.downvote');

Route::resource('/news','NewsController');

Route::get('news/{news}/comments','CommentsController@index')->name('comments.index');
Route::get('news/{news}/comments/create','CommentsController@create')->name('comments.create');
Route::post('news/{news}/comments','CommentsController@store')->name('comments.store');
Route::get('news/{news}/comments/{comment}/edit','CommentsController@edit')->name('comments.edit');
Route::patch('news/{news}/comments/{comment}','CommentsController@update')->name('comments.update');
Route::delete('news/{news}/comments/{comment}','CommentsController@destroy')->name('comments.destroy');