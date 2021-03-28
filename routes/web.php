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

//rotas de autenticação
Auth::routes();

//rotas de acesso ao painel do Admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'middleware' => 'isAdmin'], function () {
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
    Route::get('profile/{id}', 'Admin\ProfileController@show')->name('admin.profile');
    Route::post('profile/{id}/edit', 'Admin\ProfileController@update')->name('admin.profile.update');
    Route::post('profile/{id}/edit_image', 'Admin\ProfileController@updateImage')->name('admin.profile.updateImage');
    Route::post('profile/{id}/edit_password', 'Admin\ProfileController@updatePassword')->name('admin.profile.updatePassword');
    Route::get('employers', 'Admin\EmployerController@index')->name('admin.employers');
    Route::get('candidates', 'Admin\CandidateController@index')->name('admin.candidates');
    Route::get('vacancies', 'Admin\VacancieController@index')->name('admin.vacancies');
    Route::get('vacancies/analysis/{id}', 'Admin\VacancieController@show')->name('admin.vacancies.analysis');
    Route::get('users', 'Admin\UserController@index')->name('admin.users');
});

//login com linkedin
Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.linkedin');
Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.linkedin.callback');

//rotas para registro do Candidato
Route::get('/candidate/register', 'Auth\RegisterCandidateController@candidate')->name('candidate.register');
Route::post('/candidate/create', 'Auth\RegisterCandidateController@create')->name('candidate.create');

//rotas de acesso ao painel do Candidato
Route::group(['prefix' => 'candidate', 'middleware' => 'auth', 'middleware' => 'isCandidate'], function () {
    Route::get('home', 'Candidate\HomeController@index')->name('candidate.home');
    Route::get('profile/{id}', 'Candidate\ProfileController@show')->name('candidate.profile');
    Route::post('profile/{id}/edit', 'Candidate\ProfileController@update')->name('candidate.profile.update');
    Route::post('profile/{id}/edit_about', 'Candidate\ProfileController@updateAbout')->name('candidate.profile.updateAbout');
    Route::post('profile/{id}/edit_address', 'Candidate\ProfileController@updateAddress')->name('candidate.profile.updateAddress');
    Route::post('profile/{id}/edit_image', 'Candidate\ProfileController@updateImage')->name('candidate.profile.updateImage');
    Route::post('profile/{id}/edit_password', 'Candidate\ProfileController@updatePassword')->name('candidate.profile.updatePassword');
});

//rotas para registro do Empregador
Route::get('/employer/register', 'Auth\RegisterEmployerController@employer')->name('employer.register');
Route::post('/employer/create', 'Auth\RegisterEmployerController@create')->name('employer.create');

//rotas de acesso ao painel do Empregador
Route::group(['prefix' => 'employer', 'middleware' => 'auth', 'middleware' => 'isEmployer'], function () {
    Route::get('home', 'Employer\HomeController@index')->name('employer.home');
    Route::get('profile/{id}', 'Employer\ProfileController@show')->name('employer.profile');
    Route::post('profile/{id}/edit', 'Employer\ProfileController@update')->name('employer.profile.update');
    Route::post('profile/{id}/edit_about', 'Employer\ProfileController@updateAbout')->name('employer.profile.updateAbout');
    Route::post('profile/{id}/edit_address', 'Employer\ProfileController@updateAddress')->name('employer.profile.updateAddress');
    Route::post('profile/{id}/edit_image', 'Employer\ProfileController@updateImage')->name('employer.profile.updateImage');
    Route::post('profile/{id}/edit_password', 'Employer\ProfileController@updatePassword')->name('employer.profile.updatePassword');
});
