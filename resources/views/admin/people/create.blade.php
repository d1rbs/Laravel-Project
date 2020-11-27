@extends('layouts.app')

<!-- Styles -->
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Created new People</h1>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">

                            <form method="POST">
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

                                        <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('height:') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" name="height" id="height" class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" value="{{ old('height') }}" autofocus>
                                            @if(!empty($errors) && $errors->has('height'))
                                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('height') }}</strong></span>
                                            @endif
                                        </div>

                                        <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('gender:') }}</label>
                                        <div  class="col-md-6">
                                        <select name="gender" class="col-md-12 col-form-label text-md-right">
                                            @foreach($genders as $gender)
                                                <option value="{{ $gender->id}}" name="gender[]">{{ $gender->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <label for="key" class="col-md-4 col-form-label text-md-right">HomeWorld:</label>
                                        <div  class="col-md-6">
                                    <select name="homeWorld" class="col-md-12 col-form-label text-md-right">
                                        @foreach ($results as $key => $homeWorld)
                                            <option value="{{ $key + 1 }}" name="homeWorld[]">{{ $homeWorld['name'] }}</option>
                                        @endforeach
                                    </select>
                                    </div>

                                        {{--<div class="form-group row">
                                            <label for="HomeWorld" class="col-md-4 col-form-label text-md-right">{{ __('HomeWorld:') }}</label>
                                            <div class="col-md-6">
                                                <input type="text" name="HomeWorld" id="HomeWorld" class="form-control{{ $errors->has('HomeWorld') ? ' is-invalid' : '' }}" value="{{ old('HomeWorld') }}" autofocus>
                                                @if(!empty($errors) && $errors->has('HomeWorld'))
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('HomeWorld') }}</strong></span>
                                                @endif
                                            </div>--}}

                            <div class="row">
                                <label for="films" class="col-md-4 col-form-label text-md-right">Виберіть фільм:</label>
                             <div>
                                @foreach ($films as $item)
                                <label for="films" class="col-md-4 col-form-label text-md-right">{{$item['title']}}</label>
                                   <input type="checkbox" name="item[]"  value="{{ $item['episode_id']}}" multiple="multiple">
                                    @endforeach
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