<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Quiz extends Model
{
    use HasFactory;

    const ACTIVE=1;
    const INACTIVE=0;
    const DEFAULTCORRECTMARK=1;

    protected  $table='quizzes';
    protected $fillable = [
        'question',
        'topic',
        'detail',
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

     public function quizTopics(){
        return ['bangla'=>'Bangla','english'=>'English','math'=>'Math'];
     }

     public function scopeActive($q){
         return $q->where('status',Quiz::ACTIVE);
     }

     public function allQuizzes(){
        return $this->active()->latest()->get();
     }

     public function allTopicWiseQuizzes(){
        return $this->groupBy('topic')->active()->get();
     }

     public function getTopicWiseQuizCountAttribute(){
        return $this->groupBy('topic')->active()->count();
     }






    // TODO :: boot
    // boot() function used to insert logged user_id at 'created_by' & 'updated_by'
    public static function boot(){
        parent::boot();
        static::creating(function($query){
            if(\Auth::check()){
                $query->created_by = \Auth::user()->id;
            }
        });
        static::updating(function($query){
            if(\Auth::check()){
                $query->updated_by = \Auth::user()->id;
            }
        });
    }

}
