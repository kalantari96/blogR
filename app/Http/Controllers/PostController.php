<?php

namespace App\Http\Controllers;


use App\Category;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;



class PostController extends Controller
{


    public function Post(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'desc'=>'required',
            'category'=>'required',
            'tag'=>'required'
        ]);

        $post=Post::create([
            'title'=> $request['title'],
            'content' => $request['desc'],
            'category_id' => $request['category'],
            'user_id' => auth()->id(),
        ]);

        $post->tags()->attach(request('tag'));

        return redirect('/Userpage');


    }


    public function CreatePost()
    {

        if(Cache::has('posts5')){

            $posts = Cache::get('posts5');
        }else{
        $posts = Post::all();
        Cache::forever('posts5', $posts);
        // age khasti forever az beyn bere bayad az forget estefade koni

    }

//        $posts = Post::all(); age redis nabud
        return view('index', compact('posts'));



    }




    public function create(){

        $categories=Category::all()->pluck('name','id');
        $tags = Tag::all()->pluck('name','id');
        return view('post',compact('categories','tags'));
    }

    public function Userpost(){

        if(Cache::has('posts4')){

            $posts = Cache::get('posts4');

        }else{
            $posts = Post::all();
            Cache::forever('posts4', $posts);

        }

//        $posts = Post::all(); age redis nabud


        return view('userindex', compact('posts'));

    }


}
//if(cache()->has('posts')){
//
//    $posts = cache('posts');
//}else{
//    $posts = Post::all();
//    cache(['posts'=>$posts],carbon::now()->addMinute(100));
//}
