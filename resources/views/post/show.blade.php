@extends('layouts.frontend')
@section('content')
<div class="card text-center mt-5 mb-5">
    <div class="card-header">
      Featured
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$post->title}}</h5>
      <p class="card-text">{{$post->description}}</p>
    </div>
    <div class="card-footer text-body-secondary">
     {{ date('Y-m-d')}}
    </div>
  </div>

@endsection