<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostsController extends Controller
{
    public function index(){


    
        return view('posts',[ 
            // 'posts' => Post::latest()->with(['category','author'])->get(),
            'posts' => Post::latest()->filter(request(['search']))->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post){
        return view('post', [
            'post' => $post
        ]);
    }

}
