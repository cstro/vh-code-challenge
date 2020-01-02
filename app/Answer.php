<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['content', 'author'];

    public function getAuthorAttribute($value)
    {
        if ($value) return $value;

        return 'Annoymous';
    }
}
