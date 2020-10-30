@extends('layouts.app')

        <!-- Styles -->
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="links">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 <div class="container">
                     <h3>
                         Go to the Menu to select the section you need!<br>
                         You can also go to your Profile by clicking on your Nickname!
                     </h3>
                 </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
