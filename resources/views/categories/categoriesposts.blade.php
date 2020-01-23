@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Post View</div>


                <div class="dropdown col-md-4 mt-2 mb-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if(count($categories) > 0)
                                @foreach($categories->all() as $category)
                                    <li class="list-group-item"><a href='{{ url("category/{$category->id}") }}'>{{ $category->category }}</a></li>
                                @endforeach
                            @else
                                <p>No Category Found</p>
                            @endif
                    </ul>
                </div>

                <div class="panel-body mb-3 mt-3">
                    <div class="col-md-8">
                        @if(count($posts) > 0)
                            @foreach($posts->all() as $post)

                                <h4>{{ $post->post_title }}</h4>
                                <img src="{{ $post->post_image }}" alt="">
                                <p>{{ $post->post_body }}</p>

                            @endforeach
                        @else
                            <p>No Post Available</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
