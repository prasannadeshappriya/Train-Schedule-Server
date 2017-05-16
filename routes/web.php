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

Route::get('/', array (
    'as'=>'ShowIndexPage',
    'uses'=>'TrainScheduleController@index'
));

//Train Schedule Mobile App Post Requests
Route::post('train_schedule_feedback',array(
    'as'=>'TrainScheduleAppFeedbackRequest',
    'uses'=>'TrainScheduleController@insertFeedback'
));
