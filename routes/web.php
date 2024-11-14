<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function () {
    DB::insert("INSERT INTO posts (title, content) values (?, ?)",
     ['PHP with laravel', 'Laravel is the best thing that has happened to PHP']);
});

Route::get('/basicinsert', function () {
    $post = new Post;
    $post->title = 'New Eloquent title insert';
    $post->content = 'Wow eloquent is really cool, look at this content';
    $post->is_admin = true;
    $post->save();
});

Route::get('/create', function () {
    Post::create([
        'title' => 'The create method',
        'content' => 'Wow I am learning a lot with Edwin Diaz',
        'is_admin' => true
    ]);
});

Route::get('/read', function () {
    // $results = DB::select("SELECT * FROM posts WHERE id = ?", [1]);
    // foreach ($results as $post) {
    //     return $post->title;
    // }

    $results = Post::all();
    $str = "";
    foreach ($results as $post) {
        $str .= $post->title . "<br />";
    }
    return $str;
});

Route::get('/find/{id}', function ($id) {
    $post = Post::find($id);
    return $post->title;
});

Route::get('/findwhere', function () {
    $posts = Post::where('is_admin', false)->orderBy('id', 'desc')->take(1)->get();
    return $posts;
});

Route::get('/update', function () {
    $updated = DB::update("UPDATE posts SET title = ? WHERE id = ?", ['Updated title', 1]);
    return $updated;
});

Route::get('/basicupdate', function () {
    $post = Post::find(2);
    $post->title = 'Updated Eloquent title';
    $post->content = 'Updated content';
    $post->save();
});

Route::get('/update', function () {
    Post::where('id', 5)->where('is_admin', false)->update([
        'title' => 'NEW PHP TITLE',
        'content' => 'I love my learning laravel'
    ]);
});

// Route::get('/delete', function () {
//     $deleted = DB::delete("DELETE FROM posts WHERE id = ?", [1]);
//     return $deleted;
// });

Route::get('/delete', function () {
    $post = Post::find(13);
    $post->delete();
});

Route::get('/delete2', function () {
    Post::destroy([11, 12]);
});

Route::get('/delete3', function () {
    Post::where('is_admin', 0)->delete();
});

Route::get('/softdelete', function () {
    Post::find(10)->delete();
});

Route::get('/readsoftdelete', function () {
    // $post = Post::find(10);
    // return $post;

    // $post = Post::withTrashed()->where('id', 10)->get();
    // return $post;

    // $post = Post::withTrashed()->get();
    // return $post;

    $post = Post::onlyTrashed()->where('id', 10)->get();
    return $post;
});

Route::get('/restore', function () {
    Post::withTrashed()->where('is_admin', 0)->restore();
});

Route::get('/forcedelete', function () {
    Post::onlyTrashed()->where('id', 10)->forceDelete();
});

// Route::get('/faculty/{faculty?}/program/{program?}/id/{id?}/name/{name?}/', function ($faculty = null, $program = null, $id = null, $name = null) {
//     return "Name: $name" . "<br /> ID: $id" . "<br /> Program: $program" . "<br /> Faculty: $faculty";
// });

// Route::get('/test/{test}/', function ($test = 1) {
//     return $test;
// });


// Route::controller(PostController::class)->group(function() {
//     Route::get('/posts', 'index')->name('posts.index');
//     Route::get('/posts/create', 'create')->name('posts.create');
//     Route::post('/posts','store')->name('posts.store');
//     Route::get('/posts/test','test')->name('posts.test');
//     Route::get('/posts/{id}','show')->name('posts.show');
//     Route::get('/posts/edit/{id}','edit')->name('posts.edit');
//     Route::get('/posts/update','update')->name('posts.update');
//     Route::post('/posts/{id}','destroy')->name('posts.destroy');
// });

// Route::get('/students', StudentController::class . '@index')->name('students.index');