<?php

use App\Countries;

// All admin routs
require(base_path() . '/routes/admin.php');

Route::get('{name}', 'Auth\RegisterController@show')->where('name', '|register');

// KAO POLU-HOMEPAGES S 4 STRANE: NEARBY/FRIENDS/CHAT/PICTURES

Route::get('/home', 'FeedController@home');
Route::get('/friends', 'FeedController@friends');
Route::get('/chat', 'FeedController@chat');
Route::get('/pictures', 'FeedController@pictures');

// PROFIL

Route::get('/about', 'ProfileController@about');
Route::get('/album', 'ProfileController@album');
Route::get('/profile-friends', 'ProfileController@profile_friends');

// Auth::routes();

Route::post('/register', 'Auth\RegisterController@register');

Route::post('/login', 'Auth\LoginController@login');

// privremeno da se moz izlogujemo

Route::get('/logout', 'Auth\LoginController@logout');


// Update Avatar
Route::post('/update_avatar', 'AvatarsController@update_avatar');