@extends('layout.base')
@section('title', "Home | Better Blog")
@section('content')
    <section class="container">
        <section class="row">
            <article class="col-lg-3 text-center my-lg-auto my-xl-0">
                <img class="d-none d-lg-inline-block" src="{{ asset('images/logo.png') }}" height="130" width="130" alt="Logo">
                <h1 class=" logo-header">Better Blog</h1>
                <p class="font-weight-bold mt-3 font-italic">Crafting an environment where free thinkers can share their thoughts and experiences.</p>

                @guest
                <form class="p-2 rounded d-none d-xl-block" method="POST" action="{{ route('login') }}" style="background-color: #c9c9c9">
                    @csrf
                    <div class="form-group text-left">
                        <label class="font-weight-bold" for="email">Email</label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" placeholder="doe.jane@gmail.com" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group text-left">
                        <label class="font-weight-bold" for="password">Password</label>
                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button class="btn btn-success">Login</button>
                </form>
                @endguest

            </article>
            <article class="w-75 mt-3 mx-auto position-relative">
                <img class="m-0 w-100 rounded" src="{{ asset('images/thinking2.jpg') }}" alt="Thinking Image">
                <button type="button" class="btn btn-danger position-absolute" style="top:70px; right: 30px;">Share Your Stories</button>
                <p class="slogan position-absolute font-weight-bold text-dark small" style="top: 10px; left: 10%;">"Supplying the canvas to paint your life!"</p>
            </article>
        </section>
        <section class="mb-5" style="margin-top: 150px;">
            <h2 class="mb-5 text-center">Popular Blogs</h2>
            <article class="bg-dark p-3 rounded mb-4">
                <div class="row font-weight-bold">
                    <p class="col-3">Jacob Smith</p>
                    <p class="col-3">Jan 23, 2018</p>
                    <p class="col-3"><i class="far fa-thumbs-up"></i> 15</p>
                    <p class="col-3"><i class="far fa-comment"></i> 7</p>
                </div>
                <div class="row">
                    <img class="h-25 w-25 rounded col-3" src="{{ asset('images/thinking.jpg') }}" alt="Blog Image">
                    <p class="col-9">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit, orci laoreet ornare aliquam, est diam elementum justo, non imperdiet massa nulla ut massa. Vivamus hendrerit, ante ultricies luctus hendrerit, mauris dolor accumsan ante, porttitor vulputate nulla odio eu lectus. Suspendisse potenti. Mauris nec enim dapibus, sodales lectus vitae, tristique dui. Vivamus lorem urna, sollicitudin in sagittis a, finibus eget eros. Phasellus aliquet mi nec velit efficitur hendrerit. Curabitur vel tempus leo, ut tempus odio. Nullam sagittis imperdiet dolor id volutpat. Nam cursus viverra lorem, eu maximus mi tincidunt id. Praesent laoreet venenatis urna consequat tincidunt. Proin nec vulputate tellus. Aenean nec nibh nisl. Maecenas et sem sed libero iaculis pharetra...</p>
                    <p class="mx-auto text-info font-weight-bold">Read More</p>
                </div>
            </article>
            <article class="bg-dark p-3 rounded">
                <div class="row font-weight-bold">
                    <p class="col-3">Amy Johnson</p>
                    <p class="col-3">Feb 18, 2018</p>
                    <p class="col-3"><i class="far fa-thumbs-up"></i> 13</p>
                    <p class="col-3"><i class="far fa-comment"></i> 4</p>
                </div>
                <div class="row">
                    <img class="h-25 w-25 col-3" src="{{ asset('images/love.jpg') }}" alt="Blog Image">
                    <p class="col-9">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit, orci laoreet ornare aliquam, est diam elementum justo, non imperdiet massa nulla ut massa. Vivamus hendrerit, ante ultricies luctus hendrerit, mauris dolor accumsan ante, porttitor vulputate nulla odio eu lectus. Suspendisse potenti. Mauris nec enim dapibus, sodales lectus vitae, tristique dui. Vivamus lorem urna, sollicitudin in sagittis a, finibus eget eros. Phasellus aliquet mi nec velit efficitur hendrerit. Curabitur vel tempus leo, ut tempus odio. Nullam sagittis imperdiet dolor id volutpat. Nam cursus viverra lorem, eu maximus mi tincidunt id. Praesent laoreet venenatis urna consequat tincidunt. Proin nec vulputate tellus. Aenean nec nibh nisl. Maecenas et sem sed libero iaculis pharetra...</p>
                    <p class="mx-auto text-info font-weight-bold">Read More</p>
                </div>
            </article>
        </section>
    </section>
@endsection