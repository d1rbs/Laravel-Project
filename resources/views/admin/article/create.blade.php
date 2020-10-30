@extends('layouts.app')

<!-- Styles -->
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Created new Blog-article</h1>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">

                            <form method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name:') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" autofocus>
                                            @if(!empty($errors) && $errors->has('name'))
                                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }}</strong></span>
                                            @endif
                                        </div>

                                        <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('images:') }}</label>
                                        <div class="col-md-6">
                                            <input type="file" name="image"  value="{{ old('images') }}"><br>
                                        </div>

                                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('description:') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" name="description" id="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"  value="{{ old('description') }}" autofocus>
                                            @if(!empty($errors) && $errors->has('description'))
                                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('description') }}</strong></span>
                                            @endif
                                            </div>

                                        @foreach($categories as $category)
                                        <label for="category" class="col-md-4 col-form-label text-md-right">{{ $category->name }}</label>

                                            <input type="checkbox" name="category[]" value="{{ $category->id}}">
                                            @endforeach
                                            @if(!empty($errors) && $errors->has('articles'))
                                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('category') }}</strong></span>
                                            @endif


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