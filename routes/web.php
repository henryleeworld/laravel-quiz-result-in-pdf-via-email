<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizzesController;
use App\Http\Controllers\ResultsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
// User
Route::group(['as' => 'client.', 'middleware' => ['auth']], function () {
    Route::get('home', [HomeController::class, 'redirect']);
    Route::get('dashboard', [HomeController::class, 'index'])->name('home');
    Route::get('change-password', [ChangePasswordController::class, 'create'])->name('password.create');
    Route::post('change-password', [ChangePasswordController::class, 'update'])->name('password.update');
    Route::get('quiz', [QuizzesController::class, 'index'])->name('quiz');
    Route::post('quiz', [QuizzesController::class, 'store'])->name('quiz.store');
    Route::get('results/{result_id}', [ResultsController::class, 'show'])->name('results.show');
    Route::get('send/{result_id}', [ResultsController::class, 'send'])->name('results.send');
});

Auth::routes();

// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth.admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoriesController');

    // Questions
    Route::delete('questions/destroy', 'QuestionsController@massDestroy')->name('questions.massDestroy');
    Route::resource('questions', 'QuestionsController');

    // Options
    Route::delete('options/destroy', 'OptionsController@massDestroy')->name('options.massDestroy');
    Route::resource('options', 'OptionsController');

    // Results
    Route::delete('results/destroy', 'ResultsController@massDestroy')->name('results.massDestroy');
    Route::resource('results', 'ResultsController');
});
