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

                            <label for="homeWorld" class="col-md-4 col-form-label text-md-right">HomeWorld:</label>
                            <div  class="col-md-6">
                                <select name="homeWorld" class="col-md-12 col-form-label text-md-right">
                                    @foreach ($homeWorld as $world)
                                        <option value="{{ $world->id }}" name="world[]">{{ $world['name'] }}</option>
                                    @endforeach
                                </select>
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

       @if(!empty($findWorld))
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
        @endif
    </div>
@endsection