<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\SessionsController;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Services\Newsletter;
use \Illuminate\Validation\ValidationException;
use App\Http\Middleware\MustBeAdministrator;


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


Route::get('/', [PostsController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostsController::class, 'show']);
Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::get('admin/posts/create', [PostsController::class, 'create'])->middleware('admin');


// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('posts',[
//         'posts' => $category->posts,
//         'currentCategory' => $category,
//         'categories' => Category::all()
//     ]);
// })->name('category');

// Route::get('authors/{author:username}', function (User $author){
//     // dd($author);
//     return view('posts.index', [
//         'posts' => $author->posts
//     ]);
// });

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


