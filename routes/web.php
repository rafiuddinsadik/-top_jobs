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

Route::view('/', 'welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Website Routes
Route::get('index', 'Website\WelcomeController@index')->name('website.index');

// Job Details
Route::get('jobs/{id}', 'Website\JobController@show')->name('website.jobs.details')->middleware('auth');

// Company Routes
Route::group(
    [
        'prefix' => 'company',
        'namespace' => 'Company',
        'middleware' => 'auth'
    ],
    function(){

        // Route - Jobs Posting
        Route::get('jobs/create', 'JobController@showJobCreateForm')->name('company.jobs.create');
        Route::post('jobs/create', 'JobController@postJobCreateForm')->name('company.jobs.store');

    }
);


Route::group(
    [
        'prefix' => 'candidate',
        'namespace' => 'Candidate',
        'middleware' => 'auth'
    ],
    function(){

        // Apply for a Job
        Route::get('jobs/{id}/apply', 'ApplyJobController@showJobApplyForm')->name('candidate.apply-job-form');
        Route::post('jobs/{id}/apply', 'ApplyJobController@postJobApplyForm')->name('candidate.apply-job-form.post');

    }
);


// Admin Dashboard Routes
Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'middleware' => 'admin'
    ],
    function(){

        // Posted Jobs
        Route::get('jobs', 'AdminJobController@index')->name('admin.jobs.index');

        // Job Categories
        Route::get('job-categories', 'JobCategoryController@index');
        Route::resource('job-categories', 'JobCategoryController')->only([
            'index', 'store', 'update', 'destroy'
        ]);

        // Job Types
        Route::get('job-types', 'JobTypeController@index');
        Route::resource('job-types', 'JobTypeController')->only([
            'index', 'store', 'update', 'destroy'
        ]);

    }
);




// This route will remove before project deployment.
// Auto login
Route::get('auth/{uid}', function($uid){
    auth()->loginUsingId($uid);
    return redirect()->route('home');
});