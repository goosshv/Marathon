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

//Route::get('/', function () {
//    return view('home');
//})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

//Route::get('/contact', function () {
//    return view('contact');
//})->name('contact');
Route::get('/contact', 'ContactController@getListMarathon')->name('contact-list');

Route::get('/addmarathon', function () {
    return view('marathon');
})->name('marathon');



Route::post('/contact/submit', 'ContactController@submit')->name('contact-form');


Route::post('/marathon/submit', 'Admin\MarathonController@submit')->name('marathon-form');
Route::get('/marathon/all', 'Runner\MarathonController@allMarathons')->name('AllMarathons');

Route::post('/marathon/all/comments/submit/{id}', 'Runner\MarathonController@submit')->name('comment-form');
Route::get('marathon/images/{id}', 'Runner\MarathonController@getImages')-> name('AllImages');
Route::post('marathon/images/upload', 'Runner\MarathonController@uploadImage')->name('image-form');
Route::get('/marathon/all/{id}', 'Admin\MarathonController@showOneMarathon')->name('marathon-one');
Route::get('/marathon/all/{id}/update', 'Admin\MarathonController@updateOneMarathon')->name('marathon-update');

Route::post('/marathon/all/{id}/update', 'Admin\MarathonController@updateMarathon')->name('marathonUpdateSubmit');

Route::get('/marathon/all/{id}/delete', 'Admin\MarathonController@deleteOneMarathon')->name('marathon-delete');

Route::get('/logout', 'Auth\LoginController@logout');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['as'=> 'admin','prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']],
    function() {
        Route::get('/', 'HomeController@index')->name('home');
    });

Route::group(['as'=> 'runner','prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']],
    function() {
        Route::get('/', 'HomeController@index')->name('home');
    });
