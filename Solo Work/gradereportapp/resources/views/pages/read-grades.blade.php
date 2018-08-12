@extends('layout.base')
@section('title', 'Grades')
@section('content')
    <div class="container">
        @component('components.card')
            @slot('cardTitle')
                Grades
            @endslot
            @slot('cardBody')
                @if(Session::has('added-grade'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4><strong>Success!</strong></h4>
                        <span>{{ session('added-grade') }}</span>
                    </div>
                @endif
                @if(Session::has('updated-grade'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4><strong>Success!</strong></h4>
                        <span>{{ session('updated-grade') }}</span>
                    </div>
                @endif
                @if(Session::has('deleted-grade'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4><strong>Success!</strong></h4>
                        <span>{{ session('deleted-grade') }}</span>
                    </div>
                @endif

                {{--Grades--}}
                @component('components.inner-card')
                    @slot('iCardTitle')
                        Grades
                    @endslot
                    @slot('iCardBody')
                        @if(count($grades) > 0)
                                <table class="table table-responsive table-bordered table-striped table-dark rounded table-hover">
                                    <thead>
                                    <tr>
                                        <th style="width: 5%; border-top: none;" scope="col">#</th>
                                        <th scope="col" style="border-top: none; width: 50%;">Name</th>
                                        <th scope="col" style="border-top: none; width: 15%;">Percent</th>
                                        <th scope="col" style="border-top: none; width: 15%;">Letter</th>
                                        <th class="text-center" style="border-top: none; width: 5%;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($grades as $grade)
                                        <tr>
                                            <th scope="col">{{$grade->id}}</th>
                                            <td>{{$grade->studentname}}</td>
                                            <td>
                                                <div style="max-height:100px; overflow: auto;">
                                                    {{$grade->studentpercent}}
                                                </div>
                                            </td>
                                            <td>
                                                <div style="max-height:100px; overflow:auto;">
                                                    {{$grade->studentlettergrade}}
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-between">
                                                    <a href="{{ action('GradesController@edit', $grade->id) }}" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>

                                                    <form onsubmit="return confirm('Do you really want to delete?');" method="post" action="{{ action('GradesController@destroy', $grade->id) }}">
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                            <h4 class="text-center">There are currently no grades in the database, please add some grades first.</h4>
                        @endif
                    @endslot
                @endcomponent
            @endslot
        @endcomponent
    </div>
@endsection