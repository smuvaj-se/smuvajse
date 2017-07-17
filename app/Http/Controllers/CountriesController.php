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

        $query     = Countries::query();

        $nameQuery = $request->get('name');
        $showQuery = $request->get('show');

        if($nameQuery)
            $query->where('name', 'ilike', "{$nameQuery}%");

        if($showQuery && $showQuery != 'all')
            $query->where('show', "{$showQuery}");

        $request->get('orderBy') ? $query->orderBy($request->get('orderBy'), $request->get('order')) : $query->orderBy('name', 'asc');

        return $query->paginate(20);
    }
}
