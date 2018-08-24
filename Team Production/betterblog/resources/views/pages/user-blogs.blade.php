@extends('layout.base')
@section('title')
    {{ session('author-name') }}'s Blogs | Better Blog
@endsection
@section('content')
    <section class="container">
        @component('components.card')
            @slot('cardTitle')
                {{ session('author-name') }}'s Blogs
            @endslot
            @slot('cardBody')
                @if(isset($blogs) && count($blogs) > 0)

                    @foreach($blogs as $blog)
                        <article class="bg-dark p-3 rounded mb-4">
                            <div class="row font-weight-bold">
                                <p class="col-3">{{ $blog->author_name }}</p>
                                <p class="col-3">{{ $blog->created_at->format('M d, Y') }}</p>
                                <p class="col-3">
                                    <a href="{{ action('BlogsController@saveLike', $blog->id) }}">
                                        <i class="far fa-thumbs-up"></i> {{ $blog->likes }}
                                    </a>
                                </p>
                                <p class="col-3"><i class="far fa-comment"></i> {{ $blog->comments }}</p>
                            </div>

                            <div class="row">
                                <p class="col-9">{{ $blog->body }}</p>
                            </div>
                            <div class="row">
                                <a href="{{ route('show-blog', $blog->id) }}" class="mx-auto text-info font-weight-bold">Read More</a>
                            </div>

                            @if(Auth::user()->id == $blog->author_id)
                                <hr class="mt-5">
                                <div class="row justify-content-center">
                                    <a class="btn btn-warning font-weight-bold mr-5" href="{{ action('BlogsController@edit', $blog->id) }}">Edit</a>
                                    <a class="btn btn-danger font-weight-bold" href="{{ action('BlogsController@destroy', $blog->id) }}">Delete</a>
                                </div>
                            @endif
                        </article>
                    @endforeach
                @else
                    {{-- If the user has no blogs let the viewer know --}}
                    <div class="alert alert-danger text-center col-md-8 mx-auto" role="alert">
                        <h3><strong>Oh No!</strong></h3>
                        <p class="h5 mb-4">It seems this user hasn't posed any blogs yet!</p>
                    </div>
                @endif
            @endslot
        @endcomponent
    </section>
@endsection