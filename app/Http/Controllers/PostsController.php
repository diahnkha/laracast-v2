<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Models\User;

use Illuminate\Support\Facades\Http;

class PostsController extends Controller
{
    public function index(){
        return view('posts.index',[ 
            // 'posts' => Post::latest()->with(['category','author'])->get(),

            // return Post::latest()->filter(request(['search', 'category', 'author']))->paginate(3);


            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
                )->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post){
        return view('posts.show', [
            'post' => $post
        ]);
    }


}
