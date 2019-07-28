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


// doctor

Route::get('doctor/{doctor}/create','DoctorRegisterController@create')->name('doctor.register.create');
Route::post('doctor/{doctor}/create','DoctorRegisterController@store')->name('doctor.register.create');
Route::get('register/{doctor}/{token}','DoctorRegisterController@registerForm')->name('presence.registerForm');
Route::post('register/{doctor}','DoctorRegisterController@register')->name('presence.register');

Route::middleware(['auth', 'doctor'])->namespace('Presence')->group(function (){
    // language

    Route::resource('languages','LanguageController')
        ->only(['create', 'store']);

    // experience and study

    Route::middleware(['doctor','doctor_language'])
        ->resource('study','StudyController')
        ->except(['show']);

    Route::middleware(['doctor','doctor_language','study'])
        ->resource('experience','ExperienceController')
        ->except(['show']);

    Route::resource('assistant','AssistantController')
        ->only(['create','store']);

});

// availability

Route::resource('availability','Appointment\AvailabilityController')
            ->only(['index', 'create', 'store','show']);

