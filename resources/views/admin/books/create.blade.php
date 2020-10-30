@extends('layouts.app')

<!-- Styles -->
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Created new book</h1>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @elseif (!empty(session('status')))
                            <?php redirect() ;?>
                        @endif

                        <div class="container">

                            <form method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <div class="form-group row">
                                        <label for="book" class="col-md-4 col-form-label text-md-right">{{ __('book:') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" name="book" id="book" class="form-control @error('book') is-invalid @enderror" value="{{ old('book') }}" autofocus>
                                        </div>

                                            <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('images:') }}</label>
                                        <div class="col-md-6">
                                            <input type="file" name="image" id="images"  value="{{ old('images') }}"><br>
                                        </div>

                                        <label for="chapter" class="col-md-4 col-form-label text-md-right">{{ __('chapter:') }}</label>
                                        <div class="col-md-6">
                                            <input type="number" name="chapter" id="chapter"  value="{{ old('chapter') }}"><br>
                                        </div>

                                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('description:') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" name="description" id="description"  value="{{ old('description') }}">
                                        </div>

                                        <label for="active" class="col-md-4 col-form-label text-md-right">{{ __('active:') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" name="active" id="active"  value="{{ old('active') }}"><br>
                                        </div>
                                    </div>
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
    </div>
@endsection