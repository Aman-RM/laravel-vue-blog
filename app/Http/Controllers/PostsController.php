<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller

{
  public function addpost(Request $request)
  {
      $post = new Post();

      $post->newtitle = request('newtitle');
      $post->newpost = request('newpost');
      $post->cat_id = request('newcategory');

      $post->save();
      
      return $post;
   }  
   public function post()
  {
    return Post::with('category')->get();
  }
  public function destroy($id)
  {
  
     Post::find($id)->delete();

     return '';

  }
  public function editpost(Request $request, $id)
  {
    $post = Post::find($id);
    $post->newtitle = request('newtitle');
    $post->newpost = request('newpost');
    $post->save();

    return $post;
  }
  public function show($id)
  {
    $post=Post::find($id);

    return $post;
  }
}
