<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;


class BlogController extends Controller
{
    public function getIndex(){
		$posts = Post::orderBy('id', 'desc')->paginate(2);
		
		return view('blog.index')->withPosts($posts);
	}
	
    public function getSingle($slug) {
      // uzimanje iz baze 
       $post = Post::where('slug', '=', $slug)->first();
      // vraca pogled
      return view('blog.single')->withPost($post);
    }
}
