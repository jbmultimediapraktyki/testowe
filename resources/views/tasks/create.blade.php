@extends('layouts.app')

@section('content')
    <div class="container">

        {!! Form::open(['route'=>'tasks.store']) !!}
        @if ($errors -> any())
            @foreach ($errors->all() as $error)
                <div class="btn btn-danger">{{$error}}</div>
            @endforeach
        @endif

        <div class="form-group">
            {!! Form::label('title', __("Task:")) !!}
            {!! Form::text('title', null, ['class'=> 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('content', __("Text:")) !!}
            {!! Form::textarea('content', null, ['class'=> 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit( __('Submit'), ['class'=> 'btn btn-primary']) !!}
            {!! link_to(URL::previous(), __("Cancel"), ['class'=> 'btn btn-default']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection