<?php

use App\Http\Controllers\TaskController;

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

Route::resource('tasks', 'TaskController');
// routes for project.
Route::group(array('prefix' => 'project'), function()
{
Route::get('/', 'ProjectController@index');
Route::get('/add-project', 'ProjectController@add');
Route::post('/add-project-post', 'ProjectController@addPost');
Route::get('/delete-project/{id}', 'ProjectController@delete');
Route::get('/edit-project/{id}', 'ProjectController@edit');
Route::post('/edit-project-post', 'ProjectController@editPost');
Route::get('/change-status-project/{id}', 'ProjectController@changeStatus');
Route::get('/view-project/{id}', 'ProjectController@view');
 
});
// routes for testcase.
Route::group(array('prefix' => 'testcase'), function()
{
Route::get('/', 'TestcaseController@index');
Route::get('/add-testcase', 'TestcaseController@add');
Route::post('/add-testcase-post', 'TestcaseController@addPost');
Route::get('/delete-testcase/{id}', 'TestcaseController@delete');
Route::get('/edit-testcase/{id}', 'TestcaseController@edit');
Route::post('/edit-testcase-post', 'TestcaseController@editPost');
Route::get('/change-status-testcase/{id}', 'TestcaseController@changeStatus');
Route::get('/view-testcase/{id}', 'TestcaseController@view');
});
// end of testcase routes

