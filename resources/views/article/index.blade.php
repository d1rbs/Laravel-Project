@extends('layouts.app')

    <!-- Styles -->
    <link href="{{ asset('css/report.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div>
                <ul class="boris">
                    <h5>Категорії</h5>
                    @foreach($categories as $category)
                        <li class="boris"><a class="boris" href="{{ url('article/'.$category->slug)}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="links2">
                        <a href="{{ url('article')}}">Blog</a>
                    </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">

                            @foreach ($articles as $article)

                                <div class="test"><a href="{{ url('article/'.$article->slug)}}">{{$article->name}}</a></div>
                            <p> Дата створення:
                                @php
                                  $timestamp = strtotime($article->created_at);
                             echo date('d/m/Y H:i', $timestamp)
                              @endphp</p>

                            <img src="/storage/images/blog/{{$article->slug}}/{{$article['image']}}"
                                 alt="PHOTO ERRORS" width="660" height="400"><br>
                                <p class="max-lines">{{$article->description}}</p>
                        @endforeach
                    </div>
                            <div class="flex-center">
                                {{$articles->render()}}
                            </div>
                    </div>
                </div>
                 </div>
                </div>
            </div>
@endsection