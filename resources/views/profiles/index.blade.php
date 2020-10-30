@extends('layouts.app')

<!-- Styles -->
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                       {{ Auth::user()->name }}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">
                        <p>Звання:
                       @if(Auth::user()->status == 9)
                           Адміністратор
                           @endif
                            @if(Auth::user()->status == 1)
                                Користувач
                                @endif
                        </p>
                            Створення аккаунта:
                            <?php $timestamp = strtotime(Auth::user()->created_at);
                            echo date('d/m/Y', $timestamp) ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection