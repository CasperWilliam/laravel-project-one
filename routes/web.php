<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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
//     return view('home.index', []);
// })->name('home.index');

// Route::get('/contact', function () {
//     return view('home.contact');
// })->name('home.contact');

Route::get('/', [HomeController::class, 'home'])
    ->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])
    ->name('home.contact');

Route::get('/single', AboutController::class);



Route::resource('posts', PostsController::class);
    // ->only(['index', 'show', 'create', 'store', 'edit', 'update']);

// Route::get('/posts', function () use ($posts) {
//     // dd(request()->all());
//     dd((int)request()->input('page', 1));
//     return view('posts.index', ['posts' => $posts]);
// });


// Route::get('/posts/{id}', function ($id) use ($posts) {

//     abort_if(!isset($posts[$id]), 404);

//     return view('posts.show', ['post' => $posts[$id]]);
// })->where([
//     'id' => '[0-9]+'
// ])->name('posts.show');

Route::get('recent-posts/{days_ago?}', function ($daysAgo = 20) {
    return 'Posts from ' . $daysAgo . ' days ago';
})->name('posts.recent.index')->middleware('auth');

// Route::prefix('/fun')->name('fun.')->group(function () use ($posts) {

//     Route::get('/responses', function () use ($posts) {
//         return response($posts, 201)
//             ->header('Content-Type', 'application/json')
//             ->cookie('MY_COOKIE', 'Luke Siefert', 3600);
//     })->name('reponses');

//     Route::get('/redirect', function () {
//         return redirect('/contact');
//     })->name('redirect');

//     Route::get('/back', function () {
//         return back();
//     })->name('back');

//     Route::get('/named-route', function () {
//         return redirect()->route('posts.show', ['id' => 1]);
//     })->name('named-route');

//     Route::get('/away', function () {
//         return redirect()->away('https://google.com');
//     })->name('away');

//     Route::get('/json', function () use ($posts) {
//         return response()->json($posts);
//     })->name('json');

//     Route::get('/download', function () {
//         return response()->download(public_path('/daniel.jpg'), 'daniel');
//     })->name('downloads');
// });
