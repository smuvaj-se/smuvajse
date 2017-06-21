<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Storage;


class AvatarsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function update_avatar(Request $request) 
    {
    	$user=Auth::user();
        $image = $request->image;

    	if ($image) 
    	{
    		$file = $image;
            list($type, $file) = explode(';', $file);
            list(, $file)      = explode(',', $file);
            $file = base64_decode($file);
    		$filename = 'avatar.png' ;
    		if ($user->avatar !== null) 
    		{
    			$exists = Storage::disk('public')->exists($user->username.'/'.'avatar.png');
    			if ($exists)
    			{
    				Storage::delete($user->username.'/'.'avatar.png');
    			}
    		}
    		$user->avatar =true;
    		if (Storage::disk('public')->put($user->username.'/'.$filename, $file))
    		{
                $user->update();

                return response()->json([
                    'name' => $user->username,
                    'avatar' => $filename
                ]);
            } else { return 'Not Uploaded'; }
    	} 
    	if (!$image) 
    	{
    		return 'Avatar not selected';
    	}
    }
}
