<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Question;
use App\Models\UserQuiz;
use Illuminate\Http\Request;
use App\Models\QuizQuestion;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserQuizController extends Controller
{
    public function start_quiz() {

        $data['questions']=Question::all();
        $data['subjects']=Subject::all();
        return view('gameplay.start_quiz',$data);


    }
    public function index($id='')

    {
       // dd($id);
        // dd(UserQuiz::all());
        if($id=='')
        {
            return redirect()->route('start_quiz');
        }

            $ex_user_quiz=UserQuiz::where('user_id',auth()->user()->id)
            ->where('subject_id',$id)
            ->where('status',1)->first();
            //dd($ex_user_quiz->id);


            if(!$ex_user_quiz){
                $data['quiz_questions']=[];
                $data['question']=Question::where('subject_id',$id)->get()->random(1)[0];
            }
            else{
                // $data['question']=Question::find(2);


                $quiz_questions=QuizQuestion::where('quiz_id',$ex_user_quiz->id)->get();
                $data['quiz_questions']=$quiz_questions->toArray();

                $quiz_question_ids=$quiz_questions->pluck('question_id')->toArray();

                $question_set=Question::whereNotIn('id',$quiz_question_ids)->where('subject_id',$id)->get();
                //dd($question_set);

                $question_set=$question_set->random(1)[0];
                $data['question']=$question_set;
                //dd($data['question']);

            }




        return view('gameplay.index',$data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        $validator=Validator::make($request->all(),[
            'is_correct'=>'required'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else{
            $user_id=auth()->user()->id;
            $ex_user_quiz=UserQuiz::where('user_id',$user_id)
            ->where('subject_id',$request->subject_id)
            ->where('status',1)->first();


            //  dd($ex_user_quiz);
            if($ex_user_quiz==null){
                $user_quiz=new UserQuiz();
                $user_quiz->user_id=$user_id;
                $user_quiz->status=1;
                $user_quiz->subject_id=$request->subject_id;
                $user_quiz->save();
                $ex_user_quiz=$user_quiz;
            }
            $question=Question::find($id);
                $quiz_question=new QuizQuestion;
                $quiz_question->quiz_id=$ex_user_quiz->id;
                $quiz_question->question_id=$id;

                $quiz_question->is_correct=($question->answer==$request->is_correct)?true:false;
                //dd($correct);
                //dd($request->is_correct);

                $quiz_question->save();
                $quiz_question_count=QuizQuestion::where('quiz_id',$ex_user_quiz->id)->count();
                if($quiz_question_count>=5)
                {
                    $ex_user_quiz->status=2;
                    $ex_user_quiz->save();
                    return redirect()->route('gameplay.gameover',$ex_user_quiz->id);
                }
                //dd($quiz_question_count);

             //   $next_questions=DB::select('SELECT * FROM questions WHERE id NOT IN (SELECT question_id FROM quiz_questions WHERE quiz_id=?)', [$ex_user_quiz->id]);
          //  dd($next_questions);




           // dd($ids);
           //dd($data['question']);
            return redirect()->route('gameplay.index',$request->subject_id);


            // dd($user_id);
        }


    }
   public function over($id)

    {
        $ex_user_quiz=UserQuiz::where('user_id',auth()->user()->id)
        ->where('status',1)->first();
        $quiz_questions=QuizQuestion::where('quiz_id',$id)->get();

        $data['right_answer']=$quiz_questions->where('is_correct',true)->count();
        $data['wrong_answer']=$quiz_questions->where('is_correct',false)->count();
        $data['total_answer']=$quiz_questions->count();
        //dd($data['right_answer']);
        $data['quiz_questions']=$quiz_questions->toArray();


        return view('gameplay.gameover',$data) ;
    }


    /**
     * Display the specified resource.
     */
    public function show(Userquiz $userquiz)
    {
        // $data['quiz_question']==QuizQuestion::find($id)->get()->toArray();
        // dd($data['quiz_question']);


        // return view('gameplay.gameover');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Userquiz $userquiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Userquiz $userquiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Userquiz $userquiz)
    {
        //
    }
}
