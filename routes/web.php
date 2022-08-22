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



Route::group(['namespace' => 'Post'], function (){
    Route::get('/', 'IndexController')->name('family.index');
    Route::get('/family', 'IndexController')->name('family.index');
    Route::get('/family/create', 'CreateController')->name('family.create');
    Route::post('/family', 'StoreController')->name('family.store');
    Route::get('/family/{post}', 'ShowController')->name('family.show');
    Route::get('/family/{post}/edit', 'EditController')->name('family.edit');
    Route::patch('/family/{post}', 'UpdateController')->name('family.update');
    Route::delete('/family/{post}', 'DestroyController')->name('family.delete');
});




Route::get('/main', 'MainController@Index')->name('main.index');
Route::get('/contacts', 'ContactsController@Index')->name('contacts.index');
Route::get('/about', 'AboutController@Index')->name('about.index');
Route::get('/about', 'AboutController@Index2')->name('about.index');
