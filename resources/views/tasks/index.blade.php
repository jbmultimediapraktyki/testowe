@extends('layouts.app')

@php($count = 1)

@section('content')

    <div class="container">

        <a class="btn btn-primary" href="{{route('tasks.create')}}"> {{ __('Add new') }}</a>

        <div class="card">
                <table class="table table-hover">
                    <tr>
                        <th>NR</th>
                        <th>TASK</th>
                        <th>CREATED</th>
                        <th>EDIT</th>
                        <th>DONE</th>
                    </tr>

                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $count++}}</td>
                            <td><a href="{{ route('tasks.show', $task) }}"> {{ $task->title }}</a></td>
                            <td> {{ $task->created_at->diffForHumans() }}</td>
                            <td><a class="btn btn-info" href="{{route('tasks.edit', $task)}}">{{ __('Edit') }}</a></td>
                                <td>

                                    {{ Form::model($task, ['route'=>['tasks.archive', $task], 'method' => 'PUT']) }}
                                    <button class="btn btn-success">{{ __('Done') }}</button>
                                    {{ Form::close() }}
                                </td>
                        </tr>
                    @endforeach

                </table>

        </div>
        <a class="btn btn-primary" href="{{route('tasks.showArchived')}}"> {{ __('Show archived') }}</a>
    </div>

@endsection