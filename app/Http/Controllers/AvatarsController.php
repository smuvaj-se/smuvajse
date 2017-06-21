<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AvatarsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function update_avatar(Request $request) 
    {
    	$user=Auth::user();
    	if ($request->file('avatar')) 
    	{
    		$file = $request->file('avatar');
    		$filename = time(). '.' . $file->getClientOriginalExtension();
    		if ($user->avatar !== null) 
    		{
    			$exists = Storage::disk('local')->exists($user->username.'/'.$user->avatar);
    			if ($exists)
    			{
    				Storage::delete($user->username.'/'.$user->avatar);
    			}
    		}
    		$user->avatar =$filename;
    		Storage::disk('local')->put($user->username.'/'.$filename);
    		$user->update();

    		return response()->json([
			    'name' => $user->username,
			    'avatar' => $filename
			]);
    	} 
    	if (!($request->file('avatar'))) 
    	{
    		return 'Avatar not selected';
    	}
    }
}
