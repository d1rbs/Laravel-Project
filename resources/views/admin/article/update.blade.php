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
                            </div>
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>

                        <div class="container">

                            <form method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                        <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('images:') }}</label>
                                        <div class="col-md-6">
                                            <input type="file" name="image"  value="{{ old('images') }}"><br>
                                        </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Відправити') }}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection