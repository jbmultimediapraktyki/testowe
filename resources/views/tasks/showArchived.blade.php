@extends('layouts.app')

@php($count = 1)

@section('content')

    <div class="container">


        <div class="card">
            <table class="table table-hover">
                <tr>
                    <th>NR</th>
                    <th>TASK</th>
                    <th>ARCHIVED</th>
                </tr>

                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $count++}}</td>
                        <td><a href="{{ route('tasks.show', $task) }}"> {{ $task->title }}</a></td>
                        <td> {{ $task->archived_at->diffForHumans() }}</td>

                    </tr>
                @endforeach

            </table>

        </div>
        {{ link_to(URL::previous(), 'Back', ['class'=> 'btn btn-primary']) }}
    </div>

@endsection