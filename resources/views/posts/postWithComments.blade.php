@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4"> </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>{{ $post->title }}</strong></div>
                <div class="panel-body">
                    {{ $post->text }}
                    <br> <br>
                    Auteur: <strong>{{ $post->user->name }}</strong>
                </div>
            </div>
        </div>
        <div class="col-md-4">


        </div>
        <div class="row">
        <div class="col-md-12">
            <div class="col-sm-4"> </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-block">
                        <form method="POST" action="/posts/{{  $post->id }}/comments">

                            {{ csrf_field() }}
                            @if (!Auth::guest())
                            <div class="form-group">
                                <textarea name="body" placeholder="Reageer hier" class="form-control">

                                </textarea>
                            </div>


                            <div class="form-group">

                                <button id="submitButton" type="submit" class="btn btn-primary">Verstuur!</button>

                            </div>
                            @endif

                            @if (Auth::guest())
                                <div id="AlertBox" class="alert alert-info">
                                <strong>Log in om een reactie te plaatsen!</strong>
                                </div>
                            @endif

                        </form>
                    </div>
                    @foreach ($post->comments as $comment)
                        <div class="panel panel-default">
                        <div class="panel-heading">
                        @if (Auth::guest())
                            <strong>Log in om de gebruiker te zien</strong>
                        @else
                        <strong>{{ Auth::user()->name }}</strong>
                        @endif
                        <span class="text-muted">commented <b> {{ $comment->created_at->diffForHumans() }} </b></span>
                    </div>
                        <div class="panel-body">
                            {{ $comment->body }}
                        </div>
                        </div>


                    @endforeach

            </div>
            <div class="col-sm-4"> </div>
          </div>
         </div>
        </div>
      </div>
@endsection