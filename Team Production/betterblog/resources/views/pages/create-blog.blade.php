@extends('layout.base')
@section('title', "Create Blog | Better Blog")
@section('content')
    <section class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                @component('components.card')
                    @slot('cardTitle')
                        Create Blog
                    @endslot
                    @slot('cardBody')
                        <form method="POST" action="{{ action('BlogsController@store') }}">
                            @csrf
                            <div class="form-group">
                                <label class="col-form-label-sm" for="blogTitle">Title: </label>
                                <input type="text" class="form-control" id="blogTitle" name="blogTitle" required />
                            </div>
                            <div class="form-group">
                                <label class="col-form-label-sm" for="blogBody">Body: </label>
                                <textarea class="form-control" id="blogBody" name="blogBody" rows="5" required></textarea>
                            </div>
                            <div class="form-row col-12 mt-5 justify-content-md-end">
                                <button class="btn btn-success col-12 col-md-auto px-md-4" type="submit">Create</button>
                            </div>
                        </form>
                    @endslot
                @endcomponent
            </div>
        </div>
    </section>
@endsection