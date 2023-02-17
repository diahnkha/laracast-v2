<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function(){
//     $posts = Post::all();

//     // ddd($posts[0]->getPathname())
//     // dd($posts);
//     // dd($posts[0]->getContents());

//     return view('posts', [
//         'posts' => $posts
//     ]);
// });

// Route::get('/', function(){
//     $document = YamlFrontMatter::parsefile(
//         resource_path('posts/my-fourth-post.html')
//     );

//     dd($document);
//     // dd($document->body());
//     // dd($document->Matter('title'));
//     //  dd($document->date);

// });

// Route::get('/', function(){
//         //ngambil direktori langsung ke resource , gunanya file dan files itu buat scan semua yang ada di directory posts
//     $files = File::files(resource_path("posts"));
//     $documents = [];

//     foreach ($files as $file){
//         $documents[] = YamlFrontMatter::parsefile($file);

//         // $posts[] = new Post(
//         //     $document->title,
//         //     $document->excerpt,
//         //     $document->date,
//         //     $document->body()
//         // );
//     };

//     dd($documents);

// //     return view('posts', [
// //         'posts' => $posts
// //     ]);
// });

// Route::get('/', function(){
//     //ngambil direktori langsung ke resource , gunanya file dan files itu buat scan semua yang ada di directory posts
//     $files = File::files(resource_path("posts"));
//     $posts = [];

//     $posts = array_map(function($file){
//         $document = YamlFrontMatter::parsefile($file);

//         return new post(
//             $document->title,
//             $document->excerpt,
//             $document->date,
//             $document->body(),
//             $document->slug
//         );
//     },$files);

//     // foreach ($files as $file){
//     //     $document = YamlFrontMatter::parsefile($file);

//     //     $posts[] = new Post(
//     //         $document->title,
//     //         $document->excerpt,
//     //         $document->date,
//     //         $document->body(),
//     //         $document->slug
//     //     );
//     // };

//     // dd($posts);
//     // dd($posts[0]->title);

//     return view('posts', [
//         'posts' => $posts
//     ]);
// });

// Route::get('/', function(){
//     return view('posts',[
//         'posts' => Post::all()
//     ]);
// });

Route::get('/', function(){

    return view('posts',[ 
        'posts' => Post::latest()->with(['category','author'])->get()
    ]);
});

Route::get('/posts/{post:slug}', function(Post $post){
    return view('post', [
        'post' => $post
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    return view('posts',[
        'posts' => $category->posts
    ]);
});

Route::get('authors/{author:username}', function (User $author){
    // dd($author);
    return view('posts', [
        'posts' => $author->posts
    ]);
});

// Route::get('/posts/{post}', function ($slug) {

// Route::get('/posts/{post}', function ($id) {
//     //find a post by its slug and pass it to a biew called "post"

//     // $post = Post::find($slug);

//     // return view('post', [
//     //     'post' => Post::find($slug)
//     // ]);

//     return view('post', [
//         'post' => Post::findOrFail($id)
//     ]);

//     // $path = __DIR__ . "/../resources/posts/{$slug}.html";

//     // dd($path);


//     // if(! file_exists($path)){
       
//     //     return redirect('/');
//     // }

//     // $post = cache()->remember("posts.{$slug}", 1200, function () use ($path){
//     //     var_dump('file_get_contents');
//     //     return file_get_contents($path);
//     // });

//     // $post = cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));
    
//     // // $post = file_get_contents($path);

//     // return view('post', [
//     //     'isikonten' => $post
//     // ]);
// });
// // })->whereAlpha('post');

// Route::get('/posts', function () {
//     return [
//         'foo' => 'bar'
//     ];
    
// });

Route::get('/coba/{haha}', function ($slug) {
    return $slug;
});


