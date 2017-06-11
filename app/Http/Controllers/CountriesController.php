<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Countries;

class CountriesController extends Controller
{
    public function show()
    {

    	$countries = Countries::paginate(20);

    	if(request()->ajax())
    		return view('admin::partials._countries',[
				'countries' => $countries
			]);

    	return view('admin::countries.show',[
			'countries' => $countries
		]);
    }
}
