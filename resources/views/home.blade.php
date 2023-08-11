@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/gameplay-index.css') }}">


    <div class="container">
        <div class="text-dark fs-3 startq_header">
            Create and Edit Questions
        </div>
        <div class=" d-flex flex-row gap-4" >
          <a class="btn btn-primary " href="{{ route('question.index') }}">Question</a>
          <a class="btn btn-primary " href="{{ route('subject.index') }}">Subject</a>
          <a class="btn btn-primary " href="{{ route('start_quiz') }}">Start Quiz</a>



        </div>



    </div>
@endsection
