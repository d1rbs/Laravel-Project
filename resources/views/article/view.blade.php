@extends('layouts.app')

<!-- Styles -->
<link href="{{ asset('css/report.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

@section('content')
    @if(!empty(request()->slug))
        <div class="container">
            <div class="row justify-content-center">
                <div>
                    <ul class="boris">
                        <h5>Категорії</h5>
                        @foreach($categories as $category)
                            <li class="boris"><a class="boris" href="{{ url('article/'.$category->slug)}}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="links2">

                                <a href="{{ url('article/'.request()->slug)}}">{{$article->name}}</a>
                            </div>
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="container">

                                <img src="/storage/images/blog/{{$article->slug}}/{{$article['image']}}"
                                     alt="IMAGE DELETED" width="660" height="400"><br>

                                @if(Auth::user()->status == 9 || Auth::user()->status == 4 || Auth::user()->status == 4 && Auth::user()->id == $article->user_id)

                                    <div class="form-group row row-cols-md-4">
                                        <form method="POST" action="/admin/article/destroy/{{$article->id}}">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary">
                                                Видалити Блог...
                                            </button>
                                        </form>

                                        <form method="POST" action="{{ url('/admin/article/delete/'.$article->id)}}">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary ">
                                                Видалити image...
                                            </button>
                                        </form>

                                        <a class="btn btn-primary" href="{{ url('/admin/article/update/'.$article->id)}}">Змінити постер</a>
                                    </div>
                                @endif

                                <p>{{$article->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    @endif
@endsection