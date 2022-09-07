<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    const ACTIVE=1;
    const INACTIVE=0;
    protected  $table='quizzes';
    protected $fillable = [
        'quiz_question',
        'quiz_topic',
        'quiz_detail',
        'option1',
        'option2',
        'option3',
        'option4',
        'correct_option',
        'correct_mark',
        'status',
        'created_by',
        'updated_by',
    ];

 public $quizTopics=['Bangla'=>'Bangla','English'=>'English','Math'=>'Math','Bangladesh'=>'Bangladesh'];

 public function scopeActive($q){
     return $q->where('status',Quiz::ACTIVE);
 }

    public function allQuizzes($q){
        return $q->active()->latest()->get();
    }

}
