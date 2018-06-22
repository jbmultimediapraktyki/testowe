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
                    <th>DELETE</th>
                </tr>

                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $count++}}</td>
                        <td><a href="{{ route('tasks.show', $task) }}"> {{ $task->title }}</a></td>
                        <td> {{ $task->archived_at->diffForHumans() }}</td>
                        <td>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button value="archived" name="action" class="btn btn-outline-danger"
                                        href="#">{{ __('Delete') }}</button>
                            </form>

                    </tr>
                @endforeach

            </table>

        </div>
        <a class="btn btn-primary" href="{{route('tasks.index') }}">{{__('Back')}}</a>
    </div>

@endsection