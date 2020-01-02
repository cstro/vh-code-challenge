@extends('layouts.app')

@section('title', "Question #{$question->id}")

@section('content')
    <h1>{{ $question->content }}</h1>
@endsection
