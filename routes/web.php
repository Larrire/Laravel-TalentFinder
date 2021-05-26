<?php

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

Route::redirect('/', 'home');

Route::get('login', 'LoginController@login_page')->name('login');
Route::post('login', 'LoginController@login');

Route::get('register', 'LoginController@register_page')->name('register');
Route::post('register', 'LoginController@register');


// Route::get('users', 'UserController@users')->name('users');

Route::middleware(['auth'])->group(function(){
    Route::get('logout', 'LoginController@logout')->name('logout');
    
    

    Route::get('home', 'UserController@home')->name('home');
    Route::get('profile', 'UserController@profile')->name('profile');
    Route::get('view_profile', 'UserController@view_profile');

    Route::get('get_user_info', 'UserController@getUserInfo');
    Route::post('update_user_info', 'UserController@updateUserInfo');

    Route::post('experience', 'ExperienceController@store');
    Route::post('experience/update', 'ExperienceController@update');
    Route::get('experience/delete/{id}', 'ExperienceController@delete');

    Route::get('user_skills', 'SkillController@user_skills');

    Route::get('search', 'UserController@search')->name('search');

    // Experience
    Route::get('experience/getById/{id}', 'ExperienceController@getById');
});


Route::prefix('contacts')->group(function(){
    // List
    Route::get('list/{search?}', 'ContactsController@list')->name('contacts.list');
    // Create
    Route::get('/create', 'ContactsController@create')->name('contacts.create');
    Route::post('/create', 'ContactsController@store');
    // Update
    Route::get('/edit/{id}', 'ContactsController@edit')->name('contacts.edit');
    Route::post('/edit', 'ContactsController@update');
    // Delete
    Route::get('/delete/{id}', 'ContactsController@update');
});







Route::fallback(function(){
    return view('errors.404');
});