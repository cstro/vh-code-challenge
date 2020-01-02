@extends('layouts.app')

@section('title', 'Questions')

@section('content')
    <form method="POST">
        <label for="question">What's your question?</label>
        <textarea id="question" name="question"></textarea>

        <button>Ask question</button>
    </form>

    <h1>Questions</h1>
@endsection
