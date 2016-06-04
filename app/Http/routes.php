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

Route::group(['middleware' => ['web']], function () {

    /*
     *  Game CRUD methods for admin views.
     */
    Route::get('/', 'CategoryController@index');

    Route::post('add/new-game', 'GameAdminController@addGame');

    /*
    *  Category CRUD methods for admin views.
    */
    Route::post('add/new-category', 'CategoryController@store');

    Route::get('/show/{category}', 'CategoryController@show');

    Route::get('edit-category/{category}', 'CategoryController@edit');
    Route::post('save-category-edit/{category}', 'CategoryController@saveEdit');

    Route::get('delete-category/{category}', 'CategoryController@delete');
    Route::post('confirm-delete/{category}', 'CategoryController@confirmDelete');


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
    *  Buzzer Methods
    */
    Route::get('buzzer', 'BuzzerController@buzzer');

    Route::get('buzz', 'BuzzerController@buzz');
});


/*
 *  Game Methods
 */
Route::get('/game-menu', 'GameController@menu');

Route::get('/play', 'GameController@play');

Route::get('get-categories', 'GameController@getGameData');

Route::get('/home', 'HomeController@index');

Route::get('/start', 'GameController@controller');


