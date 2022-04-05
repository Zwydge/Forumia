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

Route::get('/', 'QuestionController@search')->name('search');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route qui permet de connaître la langue active
Route::get('locale', 'LocalizationController@getLang')->name('getlang');

// Route qui permet de modifier la langue
Route::get('locale/{lang}', 'LocalizationController@setLang')->name('setlang');


// QUESTIONS
Route::get('/questions', 'QuestionController@index')->name('questions');
Route::get('/question', 'QuestionController@one_question')->name('question');
Route::get('/ask', 'QuestionController@ask_question')->name('ask');
Route::get('/myquestions', 'QuestionController@myQuestions')->name('myquestions');
Route::post('/create_quest', 'QuestionController@create')->name('createquest');

// ANSWERS
Route::get('/answers', 'AnswerController@index')->name('answers');

//DOMAINS
Route::get('/domains', 'DomainController@index')->name('domains');
Route::get('/mydomains', 'DomainController@my_domains')->name('mydomains');

// Route qui renvoie vers la page de gestion de compte
Route::get('/user', 'UserController@display')->name('user');

// Route qui update les informations de compte
Route::post('/userupdate', 'UserController@update')->name('userupdate');
