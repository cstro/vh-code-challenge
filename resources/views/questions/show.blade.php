@extends('layouts.app')

@section('title', "Question #{$question->id}")

@section('content')
    <div class="py-4 mb-4 bg-primary text-white">
        <div class="container">
            <h1>{{ $question->content }}</h1>
        </div>
    </div>
    <div class="container">

        <p class="lead">
            @if ($question->answers->count())
                {{ $question->answers->count() }} {{ Str::plural('answer', $question->answers->count()) }}
            @else
                Sorry, there are no answers yet!
            @endif
        </p>

        @forelse ($question->answers as $answer)
            <div class="card my-4">
                <div class="card-body">
                    <small>{{ $answer->author }}</small>
                    <h4>{{ $answer->content }}</h4>
                    <small>Posted: {{ $answer->created_at }}</small>
                </div>
            </div>
        @empty
            <img src="https://media.giphy.com/media/d2lcHJTG5Tscg/source.gif" />
        @endforelse

        <hr />

    </div>

    <div class="row my-4">
        <div class="container">
            <h3>Can you answer this question?</h3>

            <form method="POST" action="{{ route('answers.store', [$question]) }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="question">Answer</label>
                    @error('answer')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <textarea
                        id="answer"
                        name="answer"
                        placeholder="Add as much detail as you can!"
                        class="form-control"
                    >{{ old('answer') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="question">Name (optional)</label>
                    <input
                        id="name"
                        name="name"
                        class="form-control"
                        placeholder="Annoymous"
                        value="{{ old('name') }}"
                    />
                </div>

                <button class="btn btn-primary float-right">Comment</button>
            </form>
        </div>
    </div>

@endsection
