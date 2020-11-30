@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Report #2') }}</div>

                    <div class="card-body">
                        <form action="{{ route('HomeStore') }}" method="get">
                            {{ csrf_field() }} @csrf

                            <div class="form-group">
                                <div class="form-group row">
                            <label for="homeWorld" class="col-md-4 col-form-label text-md-right">{{ __('HomeWorld:') }}</label>
                            <div  class="col-md-6">
                                <select name="homeWorld" class="col-md-6 col-form-label">
                                    @foreach ($homeWorld as $world)
                                        <option value="{{ $world->id }}" name="world[]">{{ $world['name'] }}</option>
                                    @endforeach
                                </select>
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
        {{--  @php json_encode($find, JSON_UNESCAPED_UNICODE); @endphp--}}

       @if(count($findWorld))
            @foreach($findWorld as $find)
                <div class="block__items">
                    <div class="block">
                        <div class="block__counts">
                            <div class="block__item">
                                {{ $find->name }}
                            </div>
                            <div class="block__item">
                                Обрані фільми : @foreach($find->optionNameFilms as $film){{ $film->name }},@endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
           @else
            <div class="block__items">
                <div class="block">
                    <h4 class="text-md-center">Даних немає!</h4>
                </div>
            </div>
        @endif
    </div>
@endsection