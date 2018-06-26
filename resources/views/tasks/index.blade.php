@extends('layouts.app')

@php($count = 1)

@section('content')

    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a class="btn btn-primary" href="{{route('tasks.create')}}"> {{ __('Add new') }}</a>

        <div class="card">
            <table class="table table-hover">
                <tr>
                    <th>NR</th>
                    <th>TASK</th>
                    <th>CREATED</th>
                    <th>OPTIONS</th>
                </tr>

                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $count++}}</td>
                        <td><a href="{{ route('tasks.show', $task) }}"> {{ $task->title }}</a></td>
                        <td> {{ $task->created_at->diffForHumans() }}</td>

                        <td>
                            <div class="card-group " role="group">
                                <a class="btn btn-outline-info"
                                   href="{{route('tasks.edit', $task)}}">{{ __('Edit') }}</a>

                                <form action="{{ route('tasks.update', $task) }}" method="POST">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <button value="archived" name="action"
                                            class="btn btn-outline-success">{{ __('Done') }}</button>
                                </form>

                                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-outline-danger"
                                            href="{{ route('tasks.destroy', $task)}}">{{ __('Delete') }}</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
            <a class='btn btn-primary' href="{{route('tasks.showArchived')}}"> {{ __('Show archived') }}</a>
    </div>

@endsection