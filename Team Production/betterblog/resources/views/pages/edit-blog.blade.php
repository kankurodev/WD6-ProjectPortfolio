@extends('layout.base')
@section('title', "Update Blog | Better Blog")
@section('content')
    <section class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">

                {{-- Check if the blog variable is empty and contains data --}}
                @if(isset($blog) && count($blog) > 0)

                    {{-- If the blog variable isn't empty then display the data --}}
                    @component('components.card')
                        @slot('cardTitle')
                            Update Blog
                        @endslot
                        @slot('cardBody')
                                <form method="POST" action="{{ action('BlogsController@update', $blog->id) }}">
                                    @csrf

                                    {{-- Used to mimic a patch/put method --}}
                                    <input type="hidden" name="_method" value="PATCH">

                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="blogTitle">Title: </label>
                                        <input type="text" class="form-control" id="blogTitle" name="blogTitle" value="{{ $blog->title }}" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="blogBody">Body: </label>
                                        <textarea class="form-control" id="blogBody" name="blogBody" rows="5" required>{{ $blog->body }}</textarea>
                                    </div>
                                    <div class="form-row col-12 mt-5 justify-content-md-end">
                                        <button class="btn btn-success col-12 col-md-auto px-md-4" type="submit">Update</button>
                                    </div>
                                </form>
                        @endslot
                    @endcomponent
                @else

                    {{-- If the blog variable is empty let users know --}}
                    <div class="alert alert-danger text-center col-md-8 mx-auto" role="alert">
                        <h3><strong>Oh No!</strong></h3>
                        <p class="h5 mb-4">It seems something went wrong, please go back and try again!</p>
                        <a href="javascript:history.back()" class="btn btn-success">Go Back</a>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection