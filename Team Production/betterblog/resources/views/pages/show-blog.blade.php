@extends('layout.base')
@section('title', "Blogs | Better Blog")
@section('content')
    <section class="container">
        @component('components.card')
            @slot('cardTitle')
                <h5>{{ $blog->title }}</h5>
            @endslot
            @slot('cardBody')
                <section>
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
                      @if(Auth::user()->id == $blog->author_id)
                          <div>
                            <a class="btn btn-warning" href="{{ action('BlogsController@edit', $blog->id) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ action('BlogsController@destroy', $blog->id) }}">Delete</a>
                          </div>
                      @endif
                  </article>
                </section>
            @endslot
        @endcomponent
    </section>
@endsection
