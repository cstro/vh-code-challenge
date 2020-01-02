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
                    @error('question')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <textarea
                        id="question"
                        name="question"
                        class="form-control"
                        placeholder="{{ $placeholder }}"
                    >{{ old('question') }}</textarea>
                    <small class="form-text text-muted">Make sure you end your question with a "?"</small>
                </div>

                <button class="btn btn-primary float-right">Ask question</button>
            </form>
        </div>
    </div>

    <div class="container">
        <h2 class="mb-4">...Or check out our previously asked questions</h2>
        @foreach ($questions as $question)
            <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                <a href="{{ route('questions.show', [$question]) }}">
                    <h3>{{ $question->content }}</h3>
                </a>

                <span class="badge badge-dark">{{ $question->answers->count() }} {{ Str::plural('answer', $question->answers->count()) }}</span>
            </div>
        @endforeach
    </div>

@endsection
