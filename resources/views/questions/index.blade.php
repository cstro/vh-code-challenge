@extends('layouts.app')

@section('title', 'Questions')

@section('content')

    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Vegan Hacktavist - Q&A</h1>
            <p class="lead">A place for you to ask any questions you have about Vegans!</p>
        </div>
    </div>

    <div class="row mb-4">
        <div class="container">
            <h2>Ask us a question below...</h2>
            <form method="POST" action="{{ route('questions.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="question">What would you like to know?</label>
                    <textarea id="question" name="question" class="form-control"></textarea>
                    <small class="form-text text-muted">Make sure you end you question with a "?"</small>
                </div>

                <button class="btn btn-primary float-right">Ask question</button>
            </form>
        </div>
    </div>

    <div class="container">
        <h2 class="mb-4">...Or check out our previously asked questions</h2>
        @foreach ($questions as $question)
            <a href="{{ route('questions.show', [$question]) }}">
                <h3>{{ $question->content }}</h3>
            </a>

            <hr class="my-3"/>
        @endforeach
    </div>

@endsection
