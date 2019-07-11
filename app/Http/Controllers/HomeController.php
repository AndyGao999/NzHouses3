<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\House;
use App\Post;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        $houses=House::orderBy('created_at','desc')->paginate(9);
        $posts=Post::latest()->paginate(8);

        $housesBanner=House::orderBy('created_at','asc')->limit(6)->get();
        $postsBanner=Post::orderBy('count','desc')->limit(3)->get();
        $newUsers=User::orderBy('created_at','asc')->limit(4)->get();

        return view('/home',compact('houses','posts','housesBanner','postsBanner','newUsers'));
     }
}
