@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{session('status')}}
                </div>
            @endif
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                  @foreach ( $post as $post )
                  <tr>
                    <th scope="row">{{$post->created_at}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>
                        <a href="{{route('post.edit',$post->id)}}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{route('post.delete' , $post->id)}}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr> 
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection