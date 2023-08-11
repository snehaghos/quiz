<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['subjects']=Subject::get();

        return view('subject.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subject.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
       $subject=new Subject;
       $subject->name=$request->name;
       if ($request->file('image')) {
            $file = $request->file('image');
            // @unlink(public_path('upload/student_images/'.$data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/subject'), $filename);
            $subject['image'] = $filename;
        }
        $subject->description=$request->description;

        $subject->save();
           return redirect()->route('subject.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subject=Subject::find($id);
        // dd($question);
        return view('subject.edit',compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $subject=Subject::find($id);
        $subject->name=$request->name;
        if ($request->file('image')) {
            $file = $request->file('image');
            //dd($request->file('image'));

            @unlink(public_path('upload/subject/'.$data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            //dd($filename);
            $file->move(public_path('upload/subject'), $filename);
            $subject['image'] = $filename;
        }
        $subject->description=$request->description;

        $subject->save();
        return redirect()->route('subject.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subject=Subject::find($id);
        $subject->delete();
        return redirect()->route('subject.index');
    }
}
