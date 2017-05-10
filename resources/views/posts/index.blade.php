@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div id="h1text" class="jumbotron">
                        <h1>Blog van Jens Slauerhoff</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>{{ $post->title }}</strong></div>
                        <div class="panel-body">
                            {{ $post->text }} <br> <br>
                            @if (Auth::guest())
                                Auteur: {{ $post->user->name }}
                                <br>
                                <a href="{{ url('/posts/' . $post->id)  }}"> <span id="Arrow_post" class="glyphicon glyphicon-circle-arrow-right icon-readmore"></span> </a>
                                <form method="post" action='/post/{{$post->id}}'>

                            @else
                            Auteur: <strong>{{$post->user->name }}</strong>
                            <br>
                            <a href="{{ url('/posts/' . $post->id)  }}"> <span id="Arrow_post" class="glyphicon glyphicon-circle-arrow-right icon-readmore"></span> </a>
                            <form method="post" action='/post/{{$post->id}}'>
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                @if (Auth::user()->role == 1)
                                    <button type="submit" id="deleteButton"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                @endif

                            </form>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if(!Auth::guest())
            @if (Auth::user()->role == 0)
                <div id="AlertBox" class="alert alert-info">
                    <strong>Info:</strong> om posts aan te kunnen maken en te verwijderen moet de role in de tabel: "users" 1 zijn! (Deze staat standaard op 0.)
                </div>
            @endif
        @endif
    </div>
@endsection
