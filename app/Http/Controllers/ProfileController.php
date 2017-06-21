<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Storage;


class ProfileController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function about()
    {
    	$user = Auth::user();
    	$avatar= $this->get_avatar();
    	return view('frontend.profile.about', compact('user', 'avatar'));
    }
    
    public function album() 
    {
    	$user = Auth::user();
    	$avatar= $this->get_avatar();
    	return view('frontend.profile.album', compact('user', 'avatar'));
    }

    public function profile_friends() 
    {
    	$user = Auth::user();
    	$avatar= $this->get_avatar();
    	return view('frontend.profile.profile_friends', compact('user', 'avatar'));
    }

    public function get_avatar()
    {
    	$user = Auth::user();
    	if ($user->avatar !== '') {
    		$avatar = '/storage/'.$user->username.'/'.'avatar.png';
    	}
    	if ($user->avatar == '') {
    		$avatar='default/avatar_female.jpg';
    		if ($user->sex) {
    			$avatar='default/avatar_male.jpg';
    		}
    	}
    	return $avatar;
    }
}
