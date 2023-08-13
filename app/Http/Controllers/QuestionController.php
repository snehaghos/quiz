<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // protected $subject=['science','commerce','arts'];
    public function index()
    {
        $data['questions']=Question::get();
        $data['subjects']=Subject::all();
        return view('question.index',$data);
    }
    public function start_quiz_search($subject_id) {
        $data['questions']=Question::where('subject_id',$subject_id)->get();
// dd($data['questions']);
        $htmlView=view('question.partials.index_table',$data)->render();
         return response()->json(
            ['status'=>200,
            'htmlData'=>$htmlView
            ]
        );


    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['subjects']=Subject::all();



        return view('question.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //dd($request->except('_token'));
        $validator = Validator::make($request->all(),[
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'answer' => 'required'

        ],[
            'question.required' => 'You need to write Question',
            'option_a' => 'You need to fill "Option A"'
        ] );
        if($validator->fails())
        {

            return redirect()->back()->withErrors($validator)->withInput()->with('error',$validator->getMessageBag());
        }

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/question_image'), $filename);
            $question['image'] = $filename;
        }
        if ($request->file('option_a_img')) {
            $file = $request->file('option_a_img');
            //dd($request->file('option_a_img'));
             //@unlink(public_path('upload/option_img/'.$data->option_a_img));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/option_img'), $filename);
            $question['option_a_img'] = $filename;
        }
        // if ($request->file('option_a_img')) {
        //     $file = $request->file('option_a_img');
        //     //dd($request->file('option_a_img'));
        //     $filename = date('YmdHi') . $file->getClientOriginalName();
        //     $file->move(public_path('upload/option_img'), $filename);
        //     $question['option_a_img'] = $filename;
        // }
        if ($request->file('option_b_img')) {
            $file = $request->file('option_b_img');
            //dd($request->file('option_b_img'));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/option_img'), $filename);
            $question['option_b_img'] = $filename;
        }
          if ($request->file('option_c_img')) {
            $file = $request->file('option_c_img');
            //dd($request->file('option_c_img'));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/option_img'), $filename);
            $question['option_c_img'] = $filename;
        }
          if ($request->file('option_d_img')) {
            $file = $request->file('option_d_img');
            //dd($request->file('option_d_img'));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/option_img'), $filename);
            $question['option_d_img'] = $filename;
        }
        $input=$request->except('_token');
    //    dd($input);
       $question= Question::create($input);
       return redirect()->route('question.index')->with('success','Question has been created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd($id);
        $data['question']=Question::find($id);
        $data['subjects']=Subject::all();
        // dd($question);
        return view('question.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $question=Question::find($id);
        $question->question=$request->question;
        $question->option_a=$request->option_a;
        $question->option_b=$request->option_b;
        $question->option_c=$request->option_c;
        $question->option_d=$request->option_d;
        $question->answer=$request->answer;
        if ($request->file('image')) {
            $file = $request->file('image');
            //dd($request->file('image'));
            if($question->image){
                @unlink(public_path('upload/question_image/'.$question->image));
            }

            $filename = date('YmdHi') . $file->getClientOriginalName();
            //dd($filename);
            $file->move(public_path('upload/question_image'), $filename);
            $question['image'] = $filename;
        }
        if ($request->file('option_a_img')) {
            $file = $request->file('option_a_img');
            //dd($request->file('option_a_img'));
             @unlink(public_path('upload/option_img/'.$data->option_a_img));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/option_img'), $filename);
            $question['option_a_img'] = $filename;
        }
        if ($request->file('option_b_img')) {
            $file = $request->file('option_b_img');

            @unlink(public_path('upload/option_img/'.$data->option_b_img));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/option_img'), $filename);
            $question['option_b_img'] = $filename;
        }
          if ($request->file('option_c_img')) {
            $file = $request->file('option_c_img');

            @unlink(public_path('upload/option_img/'.$data->option_c_img));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/option_img'), $filename);
            $question['option_c_img'] = $filename;
        }  if ($request->file('option_d_img')) {
            $file = $request->file('option_d_img');

            @unlink(public_path('upload/option_img/'.$data->option_d_img));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/option_img'), $filename);
            $question['option_d_img'] = $filename;
        }
        $question->subject_id=$request->subject_id;
        $question->save();
        return redirect()->route('question.index');
       //return redirect()->back();
         //return redirect()->route('question.edit',$id);




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $question=Question::find($id);
        $question->delete();
        return redirect()->route('question.index');
    }
}
