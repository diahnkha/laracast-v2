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


    public function create()
    {
        // // if(auth()->guest()){
        // //     abort(Response::HTTP_FORBIDDEN);
        // // }
        // if(auth()->user()?->username != 'penggunaku'){
            
        //     abort(Response::HTTP_FORBIDDEN);
        // }

        return view('posts.create');
    }

    public function store()
    {
        // $path = request()->file('thumbnail')->store('thumbnails');

        // return 'Done' . $path;
        // ddd(request()->all());
        // ddd(request()->file('thumbnail'));
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }



}
