<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;


class UserController extends Controller
{
    public function destroy($id){
        $post = Post::findorfail($id);
        if(Cache::has('posts4')){
            $posts = Cache::get('posts4');
             foreach($posts as $key => $post1){
                if($post1 == $post){
                    $posts->forget($key);
                  //  Cache::forget($key);
                    break;
                }
             }

//             Cache::put('posts4',$posts, carbon::now()->addMinutes(20));
             Cache::forever('posts4', $posts);
        }else{
           dd('It is deleted!');
        }

        $post->delete();
        return redirect('/Userpage');

    }



    public function edit($id)
    {
        $post = Post::findorfail($id);
        if(Cache::has('posts4')) {
            $posts = Cache::get('posts4');
            foreach ($posts as $key => $post1) {
                if ($post1 == $post) {
                    $posts->get($key);
                    //  Cache::forget($key);
                    break;
                }
            }
        }else{

                dd('It is edited!');
        }

//        $post = Post::find($id);
        $categories=Category::all()->pluck('name','id');
        $tags = Tag::all()->pluck('name','id');
        return view('useredit', compact('post','categories','tags'));
    }


    public function update(Request $request,$id){




        $this->validate($request,[
            'title'=>'required',
            'description'=>'required'
        ]);
        $post = Post::find($id);
        $post->title = $request['title'];
        $post->content = $request['description'];
        $post->category_id = $request['category'];
        $post->user_id = auth()->id();
        $post->tags()->sync(request('tag'));
        $post->save();

        $posts = Post::all();
        Cache::forever('posts4', $posts);



//        if(Cache::has('posts4')){
//
//            $posts = Cache::get('posts4');
//        }else{
//
            // age khasti forever az beyn bere bayad az forget estefade koni




            return redirect('/Userpage')->with('success', 'Your article has been updated!!');




    /*    $post=Post::create([
            $ = Nerd::find($id);
            'title'=> $request['title'],
            'content' => $request['description'],
            'category_id' => $request['category'],
            'user_id' => auth()->id()
        ]);*/





    }

}
//yechizi rajebe redis ink behtare hamaro dune dune begiri ba id k mogheye set ya get kardan
// bebini hast ya na tu redis-cli, bad vase get kardanam az keys mituni estefade koni, vase setam shart nemikhay hamunjuri mizani redis::
//bad mogheye set kardan ham mizani if(Redis::Set('Post:id', ...) tu parantez age mizani reslutesho neshun bede moafaghiyat amiz bud
// age na tu else mizane k fail shode