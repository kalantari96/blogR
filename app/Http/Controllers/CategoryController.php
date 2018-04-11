<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {


       $posts=Post::where('category_id',$category->id)->get();
        //dd($posts);
       return view('categoryposts',compact('posts'));
    }
}