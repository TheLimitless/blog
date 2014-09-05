<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::model('post', 'Post');
Route::model('project', 'Project');

Route::get('/post/{post}/show', ['as' => 'post.show', 'uses' => 'PostController@showPost']);
Route::get('/project/{project}/show', ['as' => 'project.show', 'uses' => 'ProjectController@showProject']);

Route::group(['prefix' => 'admin', 'before' => 'auth'], function() {

    Route::get('dash-board', ['as' => 'dash', 'uses' => 'AdminController@getIndex']);

    Route::get('/post/new', ['as' => 'post.new', 'uses' => 'PostController@newPost']);
    Route::get('/post/{post}/edit', ['as' => 'post.edit', 'uses' => 'PostController@editPost']);
    Route::get('/post/{post}/delete', ['as' => 'post.delete', 'uses' => 'PostController@deletePost']);

    Route::get('/project/new', ['as' => 'project.new', 'uses' => 'ProjectController@newProject']);
    Route::get('/project/{project}/edit', ['as' => 'project.edit', 'uses' => 'ProjectController@editProject']);
    Route::get('/project/{project}/delete', ['as' => 'project.delete', 'uses' => 'ProjectController@deleteProject']);

    Route::post('/project/save', ['as' => 'project.save', 'uses' => 'ProjectController@saveProject']);
    Route::post('/project/{project}/update', ['as' => 'project.update', 'uses' => 'ProjectController@updateProject']);

    Route::post('/post/save', ['as' => 'post.save', 'uses' => 'PostController@savePost']);
    Route::post('/post/{post}/update', ['as' => 'post.update', 'uses' => 'PostController@updatePost']);
});

Route::controller('/', 'BlogController');

