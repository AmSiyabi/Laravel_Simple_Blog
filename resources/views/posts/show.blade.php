@extends('main')

@section('title', '| View Post')

@section('show-style')
    <link rel="stylesheet" href="{{ asset('assets/css/show.css') }}" />
@endsection


@section('content')


    <div class="post-container">
        <h2>{{ $post->title }}</h2>

        <div class="dates">
            <p class="post-date">Created at: {{ $post->created_at->format('M j, Y H:i') }}</p>
            <p class="post-date">Last updated: {{ $post->updated_at->format('M j, Y H:i') }}</p>
        </div>
        
        <div class="post-content-container">
            <p class="load">{{ $post->body }}</p>
        </div>
    </div>

    
    <div class="sidebar">
        <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-primary">Edit</a>

        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('DELETE')
            
            <button type="submit" class="btn btn-danger" style="font-weight: normal;">Delete</button>
        </form>

        

    </div>

@endsection