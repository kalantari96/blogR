<?php

namespace App\Http\Controllers;

use App\main;
use Illuminate\Http\Request;

class maincontroller extends Controller
{
    public function index()
    {
        return view('main');
    }



        public function CreatePost()
        {
            $posts[] = Post::all();




                return view('main', compact('posts'));
            }

    public function search(Request $request)
    {
        $request['de']
    }




}
