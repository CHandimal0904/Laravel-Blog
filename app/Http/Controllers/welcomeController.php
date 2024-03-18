<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function index(){

        $post = Post::all();


        return view('welcome', compact('post'));
    }

    
}
