<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// app

Route::get('pages/{name}',function ($name){
    if(
        $name === 'conditions'
        || $name === 'packs'
        || $name === 'qsn'
        || $name === 'service'
        || $name === 'expert'
        || $name === 'policy'
        || $name === 'contract'
        || $name === 'copyright'
        || $name === 'term'
    ){
        return view('pages.' . $name);
    }

    return abort(404);
});

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

        // Admin

        Route::resource('admin','AdminController')->only(['index','show']);
        // sms verified

        Route::resource('verified','VerifiedController')->only(['edit','update']);
    });

// Form

Route::get('form',function (){

    if(auth()->user()->form){

        $form = auth()->user()->form;
        $age = date_diff(date_create($form->birth), now())->y;
        return view('form.show',compact('form','age'));

    }

    return abort(404);

})->middleware('auth')
    ->name('form');

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
Route::middleware('guest')
    ->get('register/{doctor}/{token}','DoctorRegisterController@registerForm')
    ->name('presence.registerForm');
Route::middleware('guest')
    ->post('register/{doctor}','DoctorRegisterController@register')
    ->name('presence.register');

Route::middleware(['auth', 'doctor'])->namespace('Presence')->group(function (){

    // language

    Route::resource('languages','LanguageController')
        ->only(['create', 'store']);

    // study

    Route::middleware(['doctor','doctor_language'])
        ->resource('study','StudyController')
        ->except(['show']);

    // experience

    Route::middleware(['doctor','doctor_language','study'])
        ->resource('experience','ExperienceController')
        ->except(['show']);

    // assistant

    Route::middleware(['doctor','doctor_language','study'])
        ->resource('assistant','AssistantController')
        ->except(['edit', 'update', 'index']);

    // speech

    Route::middleware(['doctor','doctor_language','study'])
        ->get('speech/{doctor}','SpeechController@speech')
        ->name('speech');

    Route::middleware(['doctor','doctor_language','study'])
        ->put('speech/{doctor}','SpeechController@update')
        ->name('speech.update');

});

Route::namespace('Appointment')->group(function (){

    // availability

    Route::middleware('auth')
        ->resource('availability','AvailabilityController')
        ->only(['index', 'create', 'store', 'show']);

    // appointment

    Route::resource('appointment','AppointmentController')
        ->except(['create','store']);

    Route::get('availability/appointment/{availability}','AppointmentController@show');

    Route::get('appointment/{appointment}/passed','AppointmentController@passed')
        ->name('appointment.passed');
    Route::get('appointment/{appointment}/ghost','AppointmentController@ghost')
        ->name('appointment.ghost');
    Route::get('appointment/{appointment}/arrived','AppointmentController@arrived')
        ->name('appointment.arrived');
    Route::get('appointment/{appointment}/first','AppointmentController@first')
        ->name('appointment.first');
    Route::get('form/{appointment}/sync','AppointmentController@syncForm')
        ->name('form.syn');
    Route::post('form/{appointment}/sync','AppointmentController@sync')
        ->name('form.syn');

    Route::post('/availability/appointment','AppointmentController@appointment');
    Route::middleware('auth')
        ->post('/availability/appointment/store','AppointmentController@store')
        ->name('appointment.post');

    // premium

    Route::middleware('auth')
        ->post('activate/{doctor}','AppointmentController@activate')
        ->name('appointment.activate');

    Route::middleware('auth')
        ->post('inactivate/{doctor}','AppointmentController@inactivate')
        ->name('appointment.inactivate');

});
