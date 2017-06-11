<?php

Route::group([
	// 'middleware' => ['auth', 'admin'],
	'prefix'     => 'admin'
], function () {

    Route::get('/', function ()    {
        return view('admin::test');
    });

    Route::get('/countries', 'CountriesController@show');

});