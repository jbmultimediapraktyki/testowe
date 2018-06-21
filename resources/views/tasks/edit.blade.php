@extends('layouts.app')

@section('content')
    <div class="container">

        {{ Form::model($task, ['route'=>['tasks.update', $task],'method' => 'PUT']) }}
        @if ($errors -> any())
            @foreach ($errors->all() as $error)
                <div class="btn btn-danger">{{$error}}</div>
            @endforeach
        @endif

        <div class="form-group">

            {{ Form::label('title', "Task: ") }}
            {{ Form::text('title', $task->title, ['class'=> 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('content', "Text: ") }}
            {{ Form::textarea('content', $task->content, ['class'=> 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Submit', ['class'=> 'btn btn-primary']) }}
            {{ link_to(URL::previous(), 'Cancel', ['class'=> 'btn btn-default']) }}
        </div>

        {{ Form::close() }}

    </div>

@endsection