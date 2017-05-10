@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('posts.store') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="col-md-4 control-label">Titel</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                        @if ($errors->has('title'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                    <label for="text" class="col-md-4 control-label">text</label>

                    <div class="col-md-6">
                        <textarea id="text" type="text" class="form-control" name="text" required> </textarea>

                        @if ($errors->has('text'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
                <button id="buttonSubmit" type="submit" class="btn">Aanmaken</button>
            </form>
        </div>
    </div>
@endsection
