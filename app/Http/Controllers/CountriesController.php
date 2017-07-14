<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Countries;

class CountriesController extends Controller
{
    
	public function show()
    {
    	return view('admin::countries.show');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'order' => 'integer|min:1|max:999'
        ]);

        Countries::find($request->input('id'))->update(request(['name', 'order', 'show']));

    }

    public function search(Request $request)
    {

        $query = Countries::query();

        if($request->get('name'))
            $query->where('name', 'ilike', "{$request->get('name')}%");

        $request->get('orderBy') ? $query->orderBy('name', $request->get('orderBy')) : $query->orderBy('name', 'asc');

        return $query->paginate(20);
    }

    public function getShownCountries(Request $request)
    {   
        if ($request->ajax()) {

            return Countries::where('show', 'true')->orderBy('order', 'asc')->get();

        } else {

            abort(404);
        }
        
    }
    
}
