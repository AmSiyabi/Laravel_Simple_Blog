
@extends('main')

@section('title', '| Home')

@section('hActive', 'current')

@section('content')

    <style>
        
            .view-post-link {
                display: inline-block;
                text-decoration: none;
                padding: 5px;
                margin-top: 10px;
                
                background-color: #0090c5; /* Green background color */
                color: white; /* Text color */
                border-radius: 5px; /* Rounded corners */
                transition-duration: 0.4s;
            }

            
            .view-post-link:hover {
                
                transition-duration: 0.4s;
                background-color: #3c8159; /* Green background color */
            }

            

    </style>

    <div id="banner-wrapper" style="margin-bottom: 30px;">
        <div id="banner" class="box container">
            <div class="row">
                <div class="col-7 col-12-medium">
                    <h2>Laravel Blog</h2>
                    <p>Building a Simple Blog Application with Laravel</p>
                </div>
                <div class="col-5 col-12-medium">
                    <ul>
                        <li><a href="{{ route('posts.index') }}" class="button large">View All Posts</a></li>
                        <li><a href="{{ route('posts.create') }}" class="button large">Create Post</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-container">
        <h2 style="margin-top: 50px;">Latest Posts</h2>
        
        <div class="row">
            
            @foreach($posts as $post)
                <div class="col-4 col-12-medium">

                    <!-- Box -->
                        <section class="box feature">
                            <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="image featured"><img src="{{ asset('assets/images/pic01.jpg') }}" alt="" /></a>
                            <div class="inner" >
                                <header>
                                    <h2>{{ substr($post->title, 0, 20) }}{{ strlen($post->title) > 20 ? '...' : '' }}</h2>
                                    <p>{{ $post->updated_at->format('M j, Y H:i') }}</p>
                                </header>
                                <p>{{ substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? '...' : '' }}</p>

                                <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="view-post-link">View Post</a>
                            </div>
                            
                        </section>

                </div>
            @endforeach
            
        </div>

    </div>

@endsection
