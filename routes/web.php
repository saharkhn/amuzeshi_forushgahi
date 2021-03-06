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



Route::namespace('Admin')->prefix('admin')->group(function (){
    $this->get('/panel' , 'PanelController@index');
    $this->post('/panel/upload-image' , 'PanelController@uploadImageSubject');
    $this->resource('/courses','CourseController');
    $this->resource('/articles','ArticleController');
    $this->resource('/episodes','EpisodeController');
});
