<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('Post');
    }


    public function Post(Request $request)
    {
        post::create([
            'dec' => $request['description'],
            'user-id' => auth()->id(),
        ]);


    }
}
