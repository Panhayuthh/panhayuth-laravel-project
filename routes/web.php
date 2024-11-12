<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/faculty/{faculty?}/program/{program?}/id/{id?}/name/{name?}/', function ($faculty = null, $program = null, $id = null, $name = null) {
    return "Name: $name" . "<br /> ID: $id" . "<br /> Program: $program" . "<br /> Faculty: $faculty";
});

Route::get('/test/{test}/', function ($test = 1) {
    return $test;
});


Route::controller(PostController::class)->group(function() {
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/posts/create', 'create')->name('posts.create');
    Route::post('/posts','store')->name('posts.store');
    Route::get('/posts/test','test')->name('posts.test');
    Route::get('/posts/{id}','show')->name('posts.show');
    Route::get('/posts/edit/{id}','edit')->name('posts.edit');
    Route::get('/posts/update','update')->name('posts.update');
    Route::post('/posts/{id}','destroy')->name('posts.destroy');
});

Route::get('/students', StudentController::class . '@index')->name('students.index');