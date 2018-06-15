@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Content here -->

    <a class="btn btn-primary", href="{{route('tasks.create')}}">Add new</a>

<table class="table table-hover">
    <tr>
        <th>ID</th>
        <th>TASK</th>
        <th>OPTIONS</th>

    </tr>
    @foreach ($tasks as $task)



        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->title  }}</td>
            <td><a class="btn btn-info" href="#">Edit</a>
                <a class="btn btn-danger" href="#"> Delete</a></td>

        </tr>

    @endforeach
</table>
    </div>


@endsection