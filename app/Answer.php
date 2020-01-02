<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['content', 'author'];

    protected $attributes = [
        'author' => 'Annoymous',
    ];
}
