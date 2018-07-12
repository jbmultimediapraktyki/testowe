@extends('layouts.app')

@section('content')


<div class="container">

    <div class="card">
        <h1>{{$task->title}}</h1>
        <p>{{ $task->content }}</p>
    </div>

    {!!  link_to(URL::previous(), __("Back"), ['class'=> 'btn btn-primary'])  !!}

</div>
    @endsection