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

                                <a href="{{ url('admin/people/'.$people->id)}}">{{$people->name}}</a>
                            </div>
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="container">
                                <div>
                                    <p>name: {{ $people->name }}</p>
                                    <p>height: {{ $people->height }}</p>
                                    <p>gender: {{ $people->gender }}</p>
                                </div>

                                    <div class="form-group row row-cols-md-1">
                                        <form method="POST" action="#">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary">
                                                Редагувати користувача
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ url('/admin/people/delete/'.$people->id)}}">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary">
                                                Видалити користувача
                                            </button>
                                        </form>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

@endsection