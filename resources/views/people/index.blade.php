@extends('layouts.app')

<!-- Styles -->
<link href="{{ asset('css/report.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="links2">
                            <a href="{{ url('people/index')}}">People</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                            <p class="col-md-8">Name:</p>
                            @foreach ($peoples as  $people)
                                <div class="col-md-8">
                                    <ul class="boris">
                                    <li class="boris"><a class="boris" href="{{ url('people/view/'. $people->id)}}">{{ $people->name }}</a></li>
                                        <a class="col-md-12"> update: {{ $people->updated_at }}</a>
                                    </ul>

                                </div>
                            @endforeach

                        </div>
                        <div class="flex-center">
                            {{$peoples->render()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection