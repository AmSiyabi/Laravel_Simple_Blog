@extends('main')

@section('title', '| All posts')

@section('vActive', 'current')

@section('content')

    <style>
        .box.feature .inner {
            padding: 1em 1em 1em 1em;
        }
        .box.feature .inner header {
            margin: 0 0 0em 0;
        }

        .cotblog {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px; /* Adjust as needed for space between divs */
        }

        .inner {
            width: 70%; /* Adjust as needed based on your design */
        }

        .post-actions {
            width: 78%; /* Adjust as needed based on your design */
            text-align: right;
            position: relative; /* Changed to relative for proper positioning */
        }

        
        .delete-post-link {
        display: inline-block;
        text-decoration: none;
        padding: 10px;
        margin-bottom: 10px;
        background-color: #ff3333; /* Red background color */
        margin-top: 38px;
        color: white;
        border-radius: 5px;
        transition-duration: 0.4s;
        }

        .delete-post-link:hover {
            background-color: #cc0000; /* Darker red on hover */
        }

        .edit-post-link,
        .view-post-link {
            display: inline-block;
            text-decoration: none;
            padding: 10px;
            margin-bottom: 10px; /* Adjust as needed for spacing between links */
            margin-top: 38px;
            background-color: #0090c5; /* Green background color */
            color: white; /* Text color */
            border-radius: 5px; /* Rounded corners */
            transition-duration: 0.4s;
        }

        .edit-post-link:hover,
        .view-post-link:hover {
            
            transition-duration: 0.4s;
            background-color: #3c8159; /* Green background color */
            
        }

        .pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination li {
    display: inline-block;
    margin-right: 5px;
}

.pagination a,
.pagination span {
    padding: 6px 12px;
    border: 1px solid #ddd;
    color: #333;
    text-decoration: none;
}

.pagination .active span {
    background-color: #007bff;
    color: #fff;
}

.pagination a:hover {
    background-color: #ddd;
}
        
    </style>

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