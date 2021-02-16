<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/candidate/register', 'Auth\RegisterCandidateController@candidate')->name('candidate.register');

Route::post('/candidate/create', 'Auth\RegisterCandidateController@create')->name('candidate.create');

Route::get('/employer/register', 'Auth\RegisterEmployerController@employer')->name('employer.register');

Route::post('/employer/create', 'Auth\RegisterEmployerController@create')->name('employer.create');
