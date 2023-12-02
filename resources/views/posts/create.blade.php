@extends('main')

@section('title', '| Create a Post')


@section('form-style')
    <link rel="stylesheet" href="{{ asset('assets/css/post-form.css') }}" />
@endsection

@section('content')

<h1>Create a New Post</h1>
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
    </div>

    <div class="form-group">
        <label for="body">Body:</label>
        <textarea id="body" name="body" rows="4" required></textarea>
    </div>

    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>
    </div>

    <button type="submit">Create Post</button>
</form>

@endsection