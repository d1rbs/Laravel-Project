@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Report #1') }}</div>

                    <div class="card-body">
                        <form action="{{ route('datesStore') }}" method="get">

                            {{ csrf_field() }} @csrf

                        <div class="form-group row">
                            <label for="date-1" class="col-md-4 col-form-label text-md-right">{{ __('from:') }}</label>

                            <div class="col-md-6">
                            <input type="date" name="from" id="from" class="form-control @error('date_from') is-invalid @enderror" value="{{ old('date_from') }}" required autocomplete="date_from" autofocus>

                                @error('date_from')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date-2" class="col-md-4 col-form-label text-md-right">{{ __('to:') }}</label>

                            <div class="col-md-6">
                                <input type="date" name="to" id="to" class="form-control @error('date_to') is-invalid @enderror" value="{{ old('date_to') }}" required autocomplete="date_to" autofocus>

                                @error('date_to')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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

        @if(!empty($findDates))
            @foreach($findDates as $find)
            <div class="block">
                @php json_encode($find, JSON_UNESCAPED_UNICODE); @endphp
                    <div class="block__items">
                        <div class="block__month">
                            Неділя/міс/рік: {{ $find->month_week }}
                        </div>
                        <div class="block__counts">
                            <div class="block__item">
                                Кількість виданих кредитів: {{ $find->count_id }}
                            </div>
                            <div class="block__item">
                                Кількість просрочених кредитів: {{ $find->expiration }}
                            </div>
                            <div class="block__item">
                                FPD5: {{ round($find->expiration,0 / $find->count_id )}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

{{-------------------------------------------------------------------------------------------------------------------------------------------}}










      @endsection