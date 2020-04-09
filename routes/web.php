<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/* dynamic route */
Route::get('/', 'Controller\JobController@index');
Route::get('jobs/{id}/{slug}','Controller\JobController@show')->name('job.show');
Route::get('company/{id}/{company}','Controller\CompanyController@index')->name('company.show');
Route::get('user/profile','Controller\UserProfileController@index')->name('user.profile');
Route::post('user/profile/create','Controller\UserProfileController@create')->name('user.create');
Route::post('user/cover-letter','Controller\UserProfileController@coverLetter')->name('user.cover');
Route::post('user/resume','Controller\UserProfileController@resume')->name('user.resume');
Route::post('user/profile','Controller\UserProfileController@profile')->name('user.photo');



/* default route */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

