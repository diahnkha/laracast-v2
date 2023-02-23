<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
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

        return view('admin.posts.create');
    }

    public function store()
    {
        // $attributes = $this->ValidationPost();
        // $post = new Post;


        // // $path = request()->file('thumbnail')->store('thumbnails');

        // // return 'Done' . $path;
        // // ddd(request()->all());
        // // ddd(request()->file('thumbnail'));
        // $attributes = request()->validate([
        //     'title' => 'required',
        //     // 'thumbnail' => 'required|image',
        //     'thumbnail' => $post>exists ? ['image'] : ['required','image'],
        //     'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
        //     'excerpt' => 'required',
        //     'body' => 'required',
        //     'category_id' => ['required', Rule::exists('categories', 'id')],
        //     'published_at' => 'required'
        // ]);

        // $attributes['user_id'] = auth()->id();
        // $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create(array_merge($this->ValidationPost(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]));

        // Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {

        $attributes = $this->validation($post);

        if($attributes['thumbnail'] ?? false ){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        // $attributes = request()->validate([
        //     'title' => 'required',
        //     'thumbnail' => $post>exists ? ['image'] : ['required','image'], 
        //     'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
        //     'excerpt' => 'required',
        //     'body' => 'required',
        //     'category_id' => ['required', Rule::exists('categories', 'id')],
        //     'published_at' => 'required'
        // ]);

        // if(isset($attributes['thumbnail'])){
        // $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        // }
        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post Deleted!');
    }

    protected function ValidationPost (?Post $post = null) : array 
    {
        $post ?? new Post();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post>exists ? ['image'] : ['required','image'], 
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'published_at' => 'required'
        ]);
    }
}
