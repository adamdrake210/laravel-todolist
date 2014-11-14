@extends('layouts.master')

@section('content')

    <h1>{{ $task->title }}</h1>
    <article>{{ $task->body }}</article>

    <p>{{ link_to('/', 'Go Back') }}</p>
@stop