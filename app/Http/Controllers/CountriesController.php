<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Countries;

class CountriesController extends Controller
{

    public function show()
    {

    	$countries = Countries::orderBy('name', 'asc')->paginate(20);

    	if(request()->ajax())
    		return $countries;

    	return view('admin::countries.show');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'order' => 'integer|min:1|max:999'
        ]);


        Countries::find($request->input('id'))->update(request(['name', 'order']));

    }

    public function search(Request $request)
    {
        $name = $request->get('name');

        return Countries::where('name', 'ilike', "{$name}%")
                ->orderBy('name', 'asc')
                ->paginate(20);
    }
}
