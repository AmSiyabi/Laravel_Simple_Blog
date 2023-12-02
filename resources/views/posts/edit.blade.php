@extends('main')

@section('title'. '| Edit Post')

@section('show-style')
    <link rel="stylesheet" href="{{ asset('assets/css/show.css') }}" />

    
@endsection

@section('content')

    
    <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="post-container">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ $post->title }}" required>
            </div>

            <div class="form-group">
                <label for="body">Body:</label>
                <textarea id="body" name="body" rows="4" required>{{ $post->body }}</textarea>
            </div>
        </div>

        <div class="sidebar">
            <button type="submit" class="btn btn-primary" style="font-weight: normal;">Save</button>
            <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel changes?')" >Cancel Update</a>
            
        </div>

    </form>

@endsection