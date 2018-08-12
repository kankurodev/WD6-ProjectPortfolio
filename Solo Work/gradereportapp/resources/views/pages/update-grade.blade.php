@extends('layout.base')
@section('title', 'Update Grade')
@section('content')
    <div class="container">
        @component('components.card')
            @slot('cardTitle')
                Update Grade
            @endslot
            @slot('cardBody')

                <form method="post" action="{{ action('GradesController@update', $grade->id) }}">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">

                    <div class="row form-group">
                        <label class="text-light col-md-2 col-form-label text-md-right" for="name">Name <span class="d-none d-md-inline">:</span></label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="name" id="name" value="{{ $grade->studentname }}" required>
                        </div>
                    </div>
                    @if(isset($errors) && count($errors) > 0)
                        <div class="row">
                            @foreach($errors->get('name') as $message)
                                <p>{{ $message }}</p>
                            @endforeach
                        </div>
                    @endif

                    <div class="row form-group">
                        <label class="text-light col-md-2 col-form-label text-md-right" for="grade">Grade <span class="d-none d-md-inline">:</span></label>
                        <div class="col-md-9">
                            <input class="form-control" type="number" name="grade" id="grade" min="0" step="any" value="{{ $grade->studentpercent }}" required>
                        </div>
                    </div>
                    @if(isset($errors) && count($errors) > 0)
                        <div class="alert alert-danger row col-md-9 offset-md-2 offset-sm-0">
                            @foreach($errors->get('grade') as $message)
                                <span class="font-weight-bold text-danger">{{ $message }}</span>
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group row mb-0 text-md-right text-center">
                        <div class="col-md-11">
                            <button type="submit" class="btn btn-success">
                                Update Grade
                            </button>
                        </div>
                    </div>
                </form>
            @endslot
        @endcomponent
    </div>
@endsection
