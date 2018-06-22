@extends('layouts.app')

@section('content')

    <div class="card w-50 mx-auto">
        <h3 class="card-header">
            To-Do: {{ Auth::user()->name }}
        </h3>
        <div class="card-body">
            {{-- Print existing elements. --}}
            <form class="input-group mb-2" method="post">
                {{ csrf_field() }}
            @foreach($todos as $todo)
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            @if ($todo->isDone === 0)
                                <input title="isDone" type="checkbox">
                            @else
                                <input title="idDone" type="checkbox" checked>
                            @endif
                        </div>
                    </div>
                    <input title="content" type="text" class="form-control" value="{!! $todo->content !!}">
                    <div class="input-group-append">
                        <input type="hidden" name="_method" value="DELETE">
                        <button formaction="{{ route('todoapp.destroy', $todo->id) }}"
                                class="btn btn-danger" type="submit">Usuń</button>
                    </div>
                </div>
            @endforeach
            </form>
            {{-- Last textbox for adding new element. --}}
            <form class="input-group" method="post">
                {{ csrf_field() }}
                <input title="content" type="text" class="form-control" name="content" placeholder="Wpisz coś...">
                <div class="input-group-append">
                    <button formaction="{{ route('todoapp.store') }}" class="btn btn-primary" type="submit">Dodaj</button>
                </div>
            </form>
        </div>
    </div>
@endsection