<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();


/*
 *  Category CRUD methods for admin views.
 */
Route::get('/', 'CategoryController@index');

Route::post('add/new', 'CategoryController@store');

Route::get('/show/{category}', 'CategoryController@show');

Route::get('edit-category/{category}', 'CategoryController@edit');
Route::post('save-category-edit/{category}', 'CategoryController@saveEdit');

/*
 * Question CRUD methods for admin views.
 */

// Add Question
Route::post('add/{category}/new', 'QuestionController@store');
Route::post('add/{category}/img', 'QuestionController@image');

// Edit Question
Route::get('edit/{question}', 'QuestionController@edit');
Route::post('save-edit/{question}', 'QuestionController@saveEdit');

// Delete Question
// TODO: I was having trouble getting this to work as a POST request.
Route::get('remove-from-category/{category}/{question}', 'QuestionController@removeFromCategory');

/*
 *  Game Methods
 */
Route::get('/game-menu', 'GameController@menu');

Route::get('/play', 'GameController@play');

Route::get('get-categories', 'GameController@getGameData');

Route::get('/home', 'HomeController@index');

Route::get('/start', 'GameController@controller');
