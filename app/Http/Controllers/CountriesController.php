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
    		return $countries;

    	return view('admin::countries.show',[
			'countries' => $countries
		]);
    }

    public function save(Request $request)
    {
       var_dump('<pre>', $request->input('countryName') , '</pre>');
       var_dump('<pre>', $request->input('countryOrder') , '</pre>');
    }
}
