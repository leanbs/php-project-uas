<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Slide;

class PagesController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        $slide = Slide::where('status', '=', 1)->get(); 
    	return view('pages.home', compact('posts'))
                    ->with('slide', $slide);
    }
}
