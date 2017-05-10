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
                        <div class="panel-heading">{{ $post->title }}</div>
                        <div class="panel-body">
                            {{ $post->text }} <br> <br>
                            @if (Auth::guest())
                                Log in om de schrijver te zien.
                            @else
                            Geschreven/aangemaakt door: {{ Auth::user()->name }}
                            @endif
                            <a href="{{ url('/posts/' . $post->id)  }}"> <span class="glyphicon glyphicon-circle-arrow-right icon-readmore"></span> </a>
                            <form method="post" action='/post/{{$post->id}}'>
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                @if (Auth::user()->role == 1)
                                    <button type="submit" id="deleteButton" class="glyphicon glyphicon-trash"><i class="fa fa-times" aria-hidden="true"></i></button>
                                @endif

                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
