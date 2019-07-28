<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Authentication

Auth::routes(['verify' => true]);

// language

Route::post('language/', [
    'before' => 'csrf',
    'as' => 'language-chooser',
    'uses' => 'LanguageController@changeLanguage'
]);

// Security

Route::namespace('Auth')
    ->prefix('security')
    ->middleware('auth')
    ->group(function (){

        Route::get('/', 'SecurityController@security')
            ->name('security');

        Route::post('/', 'SecurityController@email')
            ->name('security.email');

        Route::put('/', 'SecurityController@password')
            ->name('security.password');

    });

// Real

Route::namespace('Personal')
    ->middleware('auth')
    ->group(function (){
        // params

        Route::prefix('params')->group(function (){

            Route::get('/','ParamsController@paramsForm')->name('params');
            Route::post('/','ParamsController@params');

        });

        // address

        Route::resource('address','AddressController')->except(['show']);

        // phone

        Route::resource('phone','MobileController')->except(['show']);

        // profile

        Route::get('profile','RealController@profile')->name('profile');


    });

// Token

Route::resource('token','Personal\TokenController');


// welcome

Route::get('/', 'HomeController@index')->name('home');

// doctor

Route::resource('doctor', 'Doctor\DoctorController');

// search

Route::get('search','Directory\SearchController@index')->name('search');
Route::post('search','Directory\SearchController@search')->name('search.post');
