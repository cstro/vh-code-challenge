@extends('layouts.app')

@section('title', 'Questions')

@section('content')
    <h1>Questions</h1>

    <form method="POST" action="{{ route('questions.store') }}">
        {{ csrf_field() }}

        <label for="question">What's your question?</label>
        <textarea id="question" name="question"></textarea>

        <button>Ask question</button>
    </form>
@endsection
