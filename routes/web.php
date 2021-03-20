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

Route::get('/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/admin/profile/{id}', 'Admin\ProfileController@show')->name('admin.profile');
Route::post('/admin/profile/{id}/edit', 'Admin\ProfileController@update')->name('admin.profile.update');
Route::post('/admin/profile/{id}/edit_image', 'Admin\ProfileController@updateImage')->name('admin.profile.updateImage');
Route::post('/admin/profile/{id}/edit_password', 'Admin\ProfileController@updatePassword')->name('admin.profile.updatePassword');
Route::get('/admin/employers', 'Admin\EmployerController@index')->name('admin.employers');
Route::get('/admin/candidates', 'Admin\CandidateController@index')->name('admin.candidates');
Route::get('/admin/vacancies', 'Admin\VacancieController@index')->name('admin.vacancies');
Route::get('/admin/vacancies/analysis/{id}', 'Admin\VacancieController@show')->name('admin.vacancies.analysis');
Route::get('/admin/users', 'Admin\UserController@index')->name('admin.users');

Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.linkedin');
Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.linkedin.callback');
Route::get('/candidate/home', 'Candidate\HomeController@index')->name('candidate.home');
Route::get('/candidate/register', 'Auth\RegisterCandidateController@candidate')->name('candidate.register');
Route::post('/candidate/create', 'Auth\RegisterCandidateController@create')->name('candidate.create');

Route::get('/employer/home', 'Employer\HomeController@index')->name('employer.home');
Route::get('/employer/register', 'Auth\RegisterEmployerController@employer')->name('employer.register');
Route::post('/employer/create', 'Auth\RegisterEmployerController@create')->name('employer.create');
