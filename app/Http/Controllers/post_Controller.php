<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class post_Controller extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
        'title' => 'required',
        'description' => 'required',
        'thumbnail' => 'required|image'
        ]);
        if ($validator->fails()) {
            return back()->with('status','Something went wrong');
        }else{
            $imageName = time(). "." . $request->thumbnail->extension();
            $request ->thumbnail->move(public_path('thumbnail'), $imageName);

            Post::create([
                'User_id' => auth()->user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'thumbnail' => $imageName
            ]);
    
        }
        
        return redirect(route('post.all'))->with('status', 'Data save successfully');
    }

   
    public function show($post_id) { 
        
        $post = Post::findOrFail($post_id);
        return view('post.show', compact('post'));
    }

    public function edit($postId){
        $post = Post::findOrFail($postId);
        return view('post.edit',compact('post'));
    }

    public function update($postId, Request $request){
        Post::findOrFail($postId)->update($request->all());
        return redirect(route('post.all'))->with('status','post updated...!');
    }

    public function delete($postId){
        Post::findOrFail($postId)->delete();
        return redirect(route('post.all'));
    }

}

