<?php

use App\Countries;

// All admin routs
require(base_path() . '/routes/admin.php');

Route::get('{name}', 'Auth\RegisterController@show')->where('name', '|register|login');

// potrebna zbog zarad redirekcije neautorizovanih korisnika
Route::get('/login', 'Auth\RegisterController@show')->name('login');

// Reset password routes
Route::namespace('Auth')->group(function(){

	Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');

	Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

	Route::get('/password/reset{token?}', 'ResetPasswordController@showResetForm')->name('password.reset');

	Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.request');

});



// KAO POLU-HOMEPAGES S 4 STRANE: NEARBY/FRIENDS/CHAT/PICTURES

Route::get('/nearby', function () {
    return view('frontend.feed.nearby');
});
Route::get('/friends', function () {
    return view('frontend.feed.friends');
});
Route::get('/chat', function () {
    return view('frontend.feed.chat');
});
Route::get('/pictures', function () {
    return view('frontend.feed.pictures');
});

// PROFIL

Route::get('/about', function () {
    return view('frontend.profile.about');
});
Route::get('/album', function () {
    return view('frontend.profile.album');
});
Route::get('/profile-friends', function () {
    return view('frontend.profile.profile_friends');
});

// Auth::routes();

Route::post('/register', 'Auth\RegisterController@register');

Route::post('/login', 'Auth\LoginController@login');

// privremeno da se moz izlogujemo

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

//countries

Route::get('/countries/shown', 'CountriesController@getShownCountries');
