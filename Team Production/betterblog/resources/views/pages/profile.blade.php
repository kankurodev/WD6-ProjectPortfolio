@extends('layout.base')
@section('title')
    {{ Auth::user()->name }}'s Profile | Better Blog
@endsection
@section('content')
    <section class="container">
        @if(Session::has('info-updated'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4><strong>Success!</strong></h4>
                <span>{{ session('info-updated') }}</span>
            </div>
        @endif
        @component('components.card')
            @slot('cardTitle')
                {{ $user->name }}'s Profile
            @endslot
            @slot('cardBody')
                <h2 class="text-center">{{ $user->name }}</h2>
                <hr>
                <div class="row justify-content-around mt-5">
                    <p class="h5"><span class="font-weight-bold">Joined: </span> {{ $user->created_at->format('M d, Y') }}</p>
                    <p class="h5"><span class="font-weight-bold">Blogs: </span> {{ $blogCount }}</p>
                    <p class="h5"><span class="font-weight-bold">Likes: </span> {{ $likes }}</p>
                </div>

                <div class="row justify-content-center mt-5">
                    @if(Auth::user()->id == $user->id)
                        <a class="btn btn-success mr-5" href="{{ route('edit-info', Auth::user()->id) }}">Edit Account</a>
                    @endif
                    <a class="btn btn-primary" href="{{ route('user-blogs', $user->id) }}">Show Blogs</a>
                </div>
            @endslot
        @endcomponent
    </section>
@endsection