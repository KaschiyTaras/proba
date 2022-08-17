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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/my_family2', function () {
    return 'Сімя Кащій2';
});
Route::get('/family', 'FamilyController@Index')->name('family.index');
Route::get('/family/create', 'FamilyController@create')->name('family.create');

Route::post('/family', 'FamilyController@store')->name('family.store');
Route::get('/family/{post}', 'FamilyController@show')->name('family.show');
Route::get('/family/{post}/edit', 'FamilyController@edit')->name('family.edit');
Route::patch('/family/{post}', 'FamilyController@update')->name('family.update');
Route::delete('/family/{post}', 'FamilyController@destroy')->name('family.delete');

Route::get('/family/update', 'FamilyController@update');
Route::get('/family/delete', 'FamilyController@delete');
Route::get('/family/first_or_create', 'FamilyController@firstOrCreate');
Route::get('/family/update_or_create', 'FamilyController@updateOrCreate');


Route::get('/main', 'MainController@Index')->name('main.index');
Route::get('/contacts', 'ContactsController@Index')->name('contacts.index');
Route::get('/about', 'AboutController@Index')->name('about.index');
