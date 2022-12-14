<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizAnswerRequest;
use App\Models\Quiz;
use App\Models\QuizAnswer;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Quiz $quiz)
    {
        $this->quiz=$quiz;
    }

    public function index(Request $request)
    {
        return 'Good';
        $topic=$request->get('topic', 'default');
        return view('client.quiz.quiz-answer',['topic'=>$topic,'topicWiseQuizzes'=>$this->quiz->topicAndUserWiseQuizzesAns($topic,auth()->user()->id)]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $topic=$request->get('topic', 'default');

        return view('client.quiz.create',['topic'=>$topic,'topicWiseQuizzes'=>$this->quiz->topicWiseQuizzes($topic)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizAnswerRequest $request)//
    {
        try{
            $answerInput=[];

            foreach ($request->answer_option as $key=>$answer){

                $quiz=Quiz::find($key);

                if (!empty($quiz)){ // check quiz question exist

                    // check exam already submit or not
                    $answer=$this->checkQuizAlreadySubmitted($quiz);
                    if ($answer){
                        return redirect()->back()->with('errors', 'Your answer for topic: '.$quiz->topic.' already submitted');
                    }

                    $answerStatus=QuizAnswer::WRONG;

                    if ($quiz->correct_option==$request->answer_option[$key]){
                        $answerStatus=QuizAnswer::CORRECT;
                    }

                    $answerInput[]=[
                        'user_id'=>auth()->user()->id,
                        'quiz_id'=>$key,
                        'topic'=>$quiz->topic,
                        'answer_option'=>$request->answer_option[$key],
                        'answer_option_mark'=>$quiz->correct_mark,
                        'answer_status'=>$answerStatus,
                        'created_by'=>auth()->user()->id,
                    ];
                }

            }

            QuizAnswer::insert($answerInput);

            return redirect()->back()->with('success', 'Quiz answer submitted successfully!');

        }catch(\Exception $e){
            return back()->with('errors',$e->getMessage());
        }
    }

    public function checkQuizAlreadySubmitted($quiz){
       return QuizAnswer::where(['user_id'=>auth()->user()->id,'topic'=>$quiz->topic])->first();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
