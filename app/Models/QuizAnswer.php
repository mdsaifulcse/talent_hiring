<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAnswer extends Model
{
    use HasFactory;

    const WRONG=0;
    const CORRECT=0;
    protected  $table='quiz_answers';
    protected $fillable = [
        'user_id',
        'quiz_id',
        'answer_option',
        'answer_option_mark',
        'answer_status',
        'user_id',
        'quiz_id',
        'created_by',
        'updated_by',
    ];
}
