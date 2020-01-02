<?php

namespace App\Http\Controllers;

use App\Answer;
use \App\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Question             $question
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, Request $request)
    {
        $request->validate([
            'answer' => [
                'required',
                'min:5',
            ]
        ]);

        $question->answers()->create([
            'content' => $request->input('answer'),
            'author' => $request->input('name'),
        ]);

        return redirect()->route('questions.show', [$question]);
    }
}
