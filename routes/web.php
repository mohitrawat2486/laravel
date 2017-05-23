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

//Route::get('/student', 'Student@index');
//Route::post('student/registration', 'StudentController@registrationProcess');

//Route::resource('itemCRUD','ItemCRUDController');
//Route::get('/index', 'Student@index');

//Route::get('/students/list', ['as' => 'student.index', 'uses' => 'Student@list']);
//Route::get('/students//edit', ['as' => 'student.edit', 'uses' => 'Student@Edit']);
//Route::get('/student', ['as' => 'AddStudent', 'uses' => 'Student@index']);

Route::resource('studentCRUD','StudentCRUDController');

// Display all SQL executed in Eloquent
//Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
    //var_dump($query->sql);
///});
 
Route::resource('Home');

/* Route::post('/','url_shortner@getUrl');

Route::get('{any}', 'url_shortner@urlProcess'); */

Route::resource('itemCRUD','ItemCRUDController');

