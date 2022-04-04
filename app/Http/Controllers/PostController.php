<?php

namespace App\Http\Controllers;

use App\Http\Form\AdminCustomValidator;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
    
        return view('posts.index', compact('posts'));
    }
    
    public function __construct(AdminCustomValidator $form)
    {
        $this->form=$form;
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->isMethod('POST'))
        {  
            $this->form->validate($request, 'validatePosts');
            Post::create($request->all());
            return redirect()->route('post.index');
        }
        return view('posts.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    // 	//validate
    
    //     Post::create($request->all());
    
    //     return redirect()->route('posts.index');
    // }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        Comment::where('post_id',$id)->delete();
        return redirect()->route('post.index');
        
    }
}
