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
    return view('home');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/quiz_attempt/{attempt_id}','QuizAttemptsController@run');
    Route::post('/quiz_attempt/{attempt_id}/answer/{answer_id}','QuizAttemptsController@answer');
    Route::post('/quiz_attempt/{attempt_id}/finish','QuizAttemptsController@finish_attempt');
    Route::get('/quiz_attempt/{attempt_id}/result','QuizAttemptsController@attempt_result');
    
    Route::group(['middleware' => 'teacher'], function () {
        Route::get('/quiz_attempt/{id}/review','QuizAttemptsController@review');
        Route::resource('quizzes','QuizzesController');
        Route::resource('questions','QuestionsController');
        Route::resource('topics','TopicsController');
        Route::resource('classrooms','ClassroomsController');
        Route::resource('files','FilesController');
        Route::get('/reports', 'ReportsController@index');
        Route::get('/activities/{id}/report','ActivitiesController@report');
     });
    
    Route::group(['middleware' => 'adminonly'], function () {
        Route::resource('users','UsersController');
    });
    
    Route::post('classrooms/find','ClassroomsController@find');
    Route::get('/classrooms/{code}/activity','ClassroomsController@activity');
    
    
    Route::post('/activities/{activity_id}/attempt_quiz','ActivitiesController@attempt_quiz');
    Route::resource('activities','ActivitiesController');
    
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/profile', 'ProfileController@profile');
    Route::post('/profile/password', 'ProfileController@change_password');
});

//
//Route::resource('activity-submissions', 'ActivitySubmissionsController');
//Route::resource('quiz-attempts', 'QuizAttemptsController');
//Route::resource('quiz-attempt-answers', 'QuizAttemptAnswersController');