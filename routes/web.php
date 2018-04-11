<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PostController@CreatePost');
/*Route::get('/index', 'IndexController@index');*/

Route::get('/category/{category}', 'CategoryController@index')->name('category.index');
Route::get('/tag/{tag}', 'IndexController@index')->name('tag.index');
Route::post('/search', 'IndexController@search')->name('Searched');


Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/
Route::group(['middleware'=>['auth']],function () {
    Route::get('/show', 'PostController@create');
    Route::post('/post', 'PostController@Post')->name('Posted');

    Route::get('/Userpage', 'PostController@Userpost');
    Route::delete('/Delete/{id}', 'UserController@destroy')->name('delete.article');
    Route::get('/Edit/{id}', 'UserController@edit')->name('edit.article');
    Route::patch('/Update/{id}', 'UserController@update')->name('update.article');
});

//Route::get('/test', function(){
//   if(Redis::get('test')){
//       return 1;
//   }
//   else{
//       \Illuminate\Support\Facades\Redis::set('test',10);
//       return Redis::get('test');
//   }
//});

//Route::get('/test1', function(){
//    if(\Illuminate\Support\Facades\Cache::has('ab')){
//        return Redis::get('laravel_cache:ab');
//    }
//    else{
//        \Illuminate\Support\Facades\Cache::add('ab',10,100);
//        return \Illuminate\Filesystem\Cache::get('ab');
//    }
//});

Route::get('/clearCache',function(){
   \Illuminate\Support\Facades\Cache::forget('posts4');
});