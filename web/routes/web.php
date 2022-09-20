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

Route::group(['middleware' => 'lang'], function() {
    Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('changeLanguage');    

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('home', function() {
        return redirect()->route('home');
    });
    Route::get('game/{slug}', 'GameController@game')->name('game');
    Route::get('cat/{slug}', 'CatController@gamesbycat')->name('gamesbycat');
    Route::get('cat', 'CatController@allcat')->name('allcat');
    Route::get('tags/{slug}', 'TagsController@gamesbytags')->name('gamesbytags');
    Route::get('api_cat/{id}', 'CatController@api_gamesbycat')->name('api_gamesbycat');
    Route::post('api_vote', 'GameController@vote_game')->name('api_vote');
    Route::post('search', 'SearchController@search')->name('search');

    Route::group(['middleware'=>['auth', 'role:1'], 'prefix' => 'manage'], function() {
        Route::post('game', 'GameController@manage_game')->name('manage_game');
    });

    // --------- For Editor area (editor) -----------
    // Use React
    Route::group(['middleware'=>['auth', 'role:2'], 'prefix' => 'edit'], function() {
        Route::get('/', function() {
            return view('edit.index');
        })->name('edit');
        // Blogs
        Route::get('blogs', 'BlogsController@index');
    });

});


Auth::routes();
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');