<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $search = $request['search'];
        $categories = Category::where('name', 'LIKE', '%' . $search . '%')->get();
        $tags = Tag::where('name', 'LIKE', '%' . $search . '%')->get();
//        if (count($categories) != 0 && count($tags) != 0) {
            $category_post = array();
            foreach ($categories as $category) {
                $cat_id = $category->id;
                $posts1 = Post::where('category_id', $cat_id)->get();
                $category_post[] = $posts1;
            }




                $tag_post = array();
                foreach ($tags as $tag) {
                    $tagposts = DB::table('post_tag')->join('posts', 'post_id', '=', 'posts.id')->where('tag_id', '=', $tag->id)->select('posts.title', 'posts.content')->get();
                    $tag_post[] = $tagposts;
                }


                $posts = Post::where('content', 'LIKE', '%' . $search . '%')->get();
                $posts2 = Post::where('title', 'LIKE', '%' . $search . '%')->get();
                return view('searchedposts', compact('posts', 'posts2', 'category_post', 'tag_post'));

//            }
        }


    public function index(Tag $tag){

      $posts=$tag->posts()->get();
      return view('tagposts',compact('posts'));


    }
}
