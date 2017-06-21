<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Storage;


class FeedController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
    	$user = Auth::user();
    	$avatar= $this->get_avatar();
    	return view('frontend.feed.nearby', compact('user', 'avatar'));
    }
    
    public function friends() 
    {
    	$user = Auth::user();
    	$avatar= $this->get_avatar();
    	return view('frontend.feed.friends', compact('user', 'avatar'));
    }

    public function chat() 
    {
    	$user = Auth::user();
    	$avatar= $this->get_avatar();
    	return view('frontend.feed.chat', compact('user', 'avatar'));
    }

    public function pictures() 
    {
        $user = Auth::user();
        $avatar= $this->get_avatar();
        return view('frontend.feed.pictures', compact('user', 'avatar'));
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
