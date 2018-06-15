@extends('layouts.app')

@section('content')
    <div class="container">


    {!! Form::open(['route'=>'tasks.store'])!!}
    @if ($errors -> any())

        @foreach ($errors->all() as $error)
            <div class="btn btn-danger">{{$error}}</div>
        @endforeach

    @endif


    <div class="form-group">
        {!! Form::label('title', "Task: ") !!}
        {!! Form::text('title', null, ['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('content', "Text: ") !!}
        {!! Form::textarea('content', null, ['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Submit', ['class'=> 'btn btn-primary']) !!}
        {!! link_to(URL::previous(), 'Cancel', ['class'=> 'btn btn-default']) !!}
    </div>
    </div>
    {!! Form::close()!!}
@endsection