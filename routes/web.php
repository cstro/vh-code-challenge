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

Route::get('/', 'QuestionController@index')->name('questions.index');
Route::get('/questions/{question}', 'QuestionController@show')
    ->name('questions.show');
Route::post('/questions/create', 'QuestionController@store')
    ->name('questions.store');

Route::post('/questions/{question}/answers/create', 'AnswerController@store')
    ->name('answers.store');
