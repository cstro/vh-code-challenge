@extends('layouts.app')

@section('title', "Question #{$question->id}")

@section('content')
    <div class="container">

        <h1>{{ $question->content }}</h1>

        <p class="lead">There are currently {{ $question->answers->count() }} Answers</p>

        @foreach ($question->answers as $answer)
            <div class="card my-4">
                <div class="card-body">
                    <small>{{ $answer->author }}</small>
                    <h4>{{ $answer->content }}</h4>
                    <small>Posted: {{ $answer->created_at }}</small>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row my-4">
        <div class="container">
            <h3>Can you help answer this question?</h3>

            <form method="POST" action="{{ route('answers.store', [$question]) }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="question">Your answer</label>
                    @error('answer')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <textarea
                        id="answer"
                        name="answer"
                        class="form-control"
                    >{{ old('answer') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="question">Name (optional)</label>
                    <input
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                    />
                </div>

                <button class="btn btn-primary float-right">Comment</button>
            </form>
        </div>
    </div>

@endsection
