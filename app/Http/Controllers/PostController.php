<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Session;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function __construct(){
		$this->middleware('auth');
	}
	
    public function index()
    {
		//uzimam sve postove
        $posts = Post::orderBy('id', 'desc')->paginate(2);
		
		//uzete postove saljem u view index		
		return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories= Category::all();
		//otvaram view create
        return view('posts.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacija
		$this->validate($request, array(
			'title' => 'required|max:255',
			'slug' => 'required|alpha_dash|min:5|max:255',
			'category_id' => 'required|integer', 
			'body' => 'required'
		));
		
		//unosenje
		$post = new Post;
		
		$post->title = $request->title;
		$post->slug = $request->slug;
		$post->category_id = $request->category_id;
		$post->body = $request->body;
		
		$post->save();
		
		//$post->tags()->sync();
		
		//sesija
		
		Session::flash('success', 'The blog post was successfully save!');
		
		//redirekcija
		return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		//u pogledu show otvaram post sa $id
		$post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //naci post u bazi i sacuvati kao varijablu
		$post = Post::find($id);
		$categories= Category::all();
		$cats=array();
		foreach($categories as $category){
			$cats[$category->id]=$category->name;
		}
		//vratiti pogled,  
		return view('posts.edit')->withPost($post)->withCategories($cats);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$post = Post::find($id);
		if($request->input('slug') == $post->slug ){
			$this->validate($request, array(
			'title' => 'required|max:255',
			'category_id' => 'required|integer', 
			'body' => 'required'
		));
		}else{
        //validacija
		$this->validate($request, array(
			'title' => 'required|max:255',
			'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
			'category_id' => 'required|integer', 
			'body' => 'required'
		));
		}
		//unosenje
		$post = Post::find($id);
		
		$post->title = $request->input('title');
		$post->slug = $request->input('slug');
		$post->category_id = $request->input('category_id');
		$post->body = $request->input('body');
		
		$post->save();
		
		//sesija
		
		Session::flash('success', 'The blog post was successfully updated!');
		
		//redirekcija
		return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
		
		$post->delete();
		
		Session::flash('success', 'The post was successfully deleted');
		
		return redirect()->route('posts.index');
    }
}
