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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/candidate/register', [App\Http\Controllers\Auth\RegisterCandidateController::class, 'candidate'])->name('candidate.register');

Route::post('/candidate/create', [App\Http\Controllers\Auth\RegisterCandidateController::class, 'create'])->name('candidate.create');

Route::get('/employer/register', [App\Http\Controllers\Auth\RegisterEmployerController::class, 'employer'])->name('employer.register');

Route::post('/employer/create', [App\Http\Controllers\Auth\RegisterEmployerController::class, 'create'])->name('employer.create');
