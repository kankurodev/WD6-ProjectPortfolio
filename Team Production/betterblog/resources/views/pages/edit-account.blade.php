@extends('layout.base')
@section('title', 'Update Account | Better Blog')
@section('content')
    <section class="container">
        @component('components.card')
            @slot('cardTitle')
                Update Information
            @endslot
            @slot('cardBody')

                <form method="post" action="{{ action('ProfileController@updateInfo', $user->id) }}">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">

                    <div class="row form-group">
                        <label class="text-dark col-md-2 col-form-label text-md-right" for="name">Name <span class="d-none d-md-inline">:</span></label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="text-dark col-md-2 col-form-label text-md-right" for="email">Email <span class="d-none d-md-inline">:</span></label>
                        <div class="col-md-9">
                            <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="text-dark col-md-2 col-form-label text-md-right">Password <span class="d-none d-md-inline">:</span></label>
                        <div class="col-md-9">
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="text-dark col-md-2 col-form-label text-md-right">Confirm Password <span class="d-none d-md-inline">:</span></label>

                        <div class="col-md-9">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group row mb-0 text-md-right text-center">
                        <div class="col-md-11">
                            <button type="submit" class="btn btn-success">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            @endslot
        @endcomponent
    </section>
@endsection