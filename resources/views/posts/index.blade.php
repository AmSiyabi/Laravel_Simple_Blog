@extends('main')

@section('title', '| All posts')

@section('vActive', 'current')

@section('posts-index')
    <link rel="stylesheet" href="{{ asset('assets/css/posts-index.css') }}" />
@endsection

@section('content')

    <div id="banner-wrapper" style="margin-bottom: 30px;">
        <div id="banner" class="box container">
            <div class="row">
                <div class="col-7 col-12-medium">
                    <h2>All Posts</h2>
                    <p>These are all the posts you have created</p>
                </div>
                <div class="col-5 col-12-medium">
                    <ul>
                        <li><a href="{{ route('posts.create') }}" class="button large ">Create New Post</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="column">
        
        @foreach($posts as $post)
            <div class="col-4 col-12-medium" style="margin-bottom: 10px;">

                <!-- Box -->
                    <section class="box feature">
                        
                        <div class='cotblog'>
                            <div class="inner">
                                <header>
                                    <h2>{{ $post->title }}</h2>
                                    <p>{{ $post->updated_at->format('M j, Y H:i') }}</p>
                                </header>
                                <p>{{ substr($post->body, 0, 100) }}{{ strlen($post->body) > 100 ? '...' : '' }}</p>
                                
                            </div>
    
                            <div class="post-actions" style="text-align: right; position: absolute;">
                                <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="view-post-link">View</a>
                                <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="edit-post-link">Edit</a>

                                <a href="{{ route('posts.destroy', ['post' => $post->id]) }}"
                                    class="delete-post-link"
                                    style="font-weight: normal;"
                                    onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this post?')) document.getElementById('delete-post-form-{{ $post->id }}').submit();"
                                 >
                                     Delete
                                 </a>
                             
                                 {{-- Hidden Form for Delete Action --}}
                                 <form id="delete-post-form-{{ $post->id }}" action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST" style="display: none;">
                                     @csrf
                                     @method('DELETE')
                                 </form>
                                
                            </div>
                        </div>
                        

                    </section>

            </div>
        @endforeach
        
        
    </div>

    <div class="pagination">
        {{ $posts->links(); }}
    </div>

    

@endsection