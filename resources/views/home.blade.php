@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('Post.store') }}">
                        @csrf
                        <div class="mb-3">
                          <label>Input Post Title</label>
                          <input type="text" name="title" class="form-control"  placeholder="Enter Your Post Title">
                        </div>

                        <div class="mb-3">
                            <label>Input Post Description</label>
                                <textarea class="form-control" placeholder="Enter Description Here" name="description"></textarea>
                              </div>

                        <button type="submit"  class="btn btn-primary">Post</button>
                    </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
