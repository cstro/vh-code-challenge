<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $placeholderQuestions = [
            'Where do you get your protein from?',
            'If an animal is born to be eaten, why does it matter?',
            'What do Vegans do at Christmas!?',
            'Can Vegans eat cheese?',
        ];

        $placeholder = Arr::random($placeholderQuestions);
        $questions = Question::orderBy('created_at', 'desc')->get();
        return view('questions.index', [
            'questions' => $questions,
            'placeholder' => $placeholder
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => [
                'required',
                'min:5',
                function ($attribute, $value, $fail) {
                    if (substr($value, -1) !== '?') {
                        $fail('The '.$attribute.' must end with a question mark.');
                    }
                },
            ]
        ]);

        $question = Question::create(['content' => $request->input('question')]);
        return redirect()->route('questions.show', [$question]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('questions.show', ['question' => $question]);
    }

}
