<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\api\v1\PostsController;

Route::get('/', function () {
    return view('welcome');
});
