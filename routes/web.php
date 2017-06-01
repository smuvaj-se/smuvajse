<?php

/*
|--------------------------------------------------------------------------
| Temporary Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
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
