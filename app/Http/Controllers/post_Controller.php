<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class post_Controller extends Controller
{
    public function store(Request $request){
        Post::create([
            'User_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description
        ]);

        return back();
    }
}
