@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/gameplay-index.css') }}">

    <div class="container">
        <h1>gameplay</h1>

        {{-- <h2 class="btn btn-success" >Gameover</h2> --}}
        @if ($errors)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <style>
            .circle{
                width: 50px;
                height: 50px;
            }
        </style>
        <div class="row justify-content-center">
            @foreach ([1, 2, 3, 4, 5] as $k => $v)
            {{-- @dd([1, 2, 3, 4, 5])--}}
             {{-- @dd($quiz_question) --}}
                @if (count($quiz_questions) == 0)
                    <div class="rounded-circle p-4 border border-3 me-3 border-primary circle d-flex justify-content-center align-items-center">
                        {{ $v }}
                    </div>
                @else
                    @if (isset($quiz_questions[$k]) && $quiz_questions[$k]['is_correct'] == 1)
                        <div class="rounded-circle p-4 border me-3 border-success bg-success circle d-flex justify-content-center align-items-center">
                            {{ $v }}
                        </div>
                    @elseif (isset($quiz_questions[$k]) && $quiz_questions[$k]['is_correct'] == 0)
                        <div class="rounded-circle p-4 border me-3 border-danger bg-danger circle d-flex justify-content-center align-items-center">
                            {{ $v }}
                        </div>
                    @else
                        <div class="rounded-circle p-4 border me-3 border-3 border-primary circle d-flex justify-content-center align-items-center">
                            {{ $v }}
                        </div>
                    @endif
                @endif
            @endforeach
        </div>

        <form action="{{ route('gameplay.store', $question->id) }}" method="POST">
            @csrf


            <div class="row ">
                @if($question->image)


                    <div class="offset-md-2 col-md-8">
                        <div class="form-group mb-4  ">
                            <label for="question">Question </label>
                            {{-- @dd($question) --}}
                            <div class=" gameplay_question_image  ">
                                <div>
                                    <img src="{{ asset('upload/question_image') . '/' . $question->image}}" class="img-fluid ">

                                </div>
                                <div>
                                    {{ $question->question }}
                                </div>

                               </div>

                        </div>
                    </div>
                @else

                <div class="offset-md-2 col-md-8">
                    <div class="form-group mb-4  ">
                        <label for="question">Question </label>
                        {{-- @dd($question) --}}
                        <div class="form-control rounded-2  gameplay_question ">{{ $question->question }}</div>

                    </div>
                </div>
                @endif
            </div>

            <div class="row">

                <div class="offset-md-2 col-md-4">
                    <div class="form-group mb-3 border border-info rounded-2">
                        <div class="input-group">
                            <div class="input-group-text d-flex bg-info">
                                <input class="form-check-input" type="radio" name="is_correct" id="gridRadios1"
                                    value="option_a">
                                <div class="ms-2">A</div>
                            </div>
                            <div class="optionBox form-control"id="optionA">{{ $question->option_a }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3 border border-info rounded-2">

                        <div class="input-group">
                            <div class="input-group-text d-flex bg-info"> <input class="form-check-input" type="radio"
                                    name="is_correct" id="gridRadios2" value="option_b">
                                <div class="ms-2" name="option_b">B</div>
                            </div>
                            <div class="optionBox form-control" id="optionB">{{ $question->option_b }}</div>
                        </div>

                    </div>
                </div>
                <div class="offset-md-2 col-md-4">
                    <div class="form-group mb-3 border border-info rounded-2">
                        <div class="input-group">
                            <div class="input-group-text d-flex bg-info"> <input class="form-check-input" type="radio"
                                    name="is_correct" id="gridRadios3" value="option_c">
                                <div class="ms-2">C</div>
                            </div>
                            <div class="optionBox form-control" id="optionC">{{ $question->option_c }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3 border border-info rounded-2">
                        <div class="input-group">

                            <div class="input-group-text d-flex  bg-info"> <input class="form-check-input" type="radio"
                                    name="is_correct" id="gridRadios4" value="option_d">
                                <div class="ms-2">D</div>
                            </div>
                            <div class="optionBox form-control" id="optionD">{{ $question->option_d }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-2 col-md-8">
                    <input type="text"  class="sr-only" name="subject_id" value="{{ $question->subject_id }}">
                    <button type="submit" id="nextQuestion" class="btn btn-success w-100">Next </button>
                </div>
            </div>
        </form>
    </div>

    {{-- <script type="text/javascript">
        $(document).ready(() => {
            $('#gridRadios1').on('click', (e) => {
                console.log(e);
                @if ($question->answer == 'option_a')
                    $('#optionA').addClass('addBg');
                @else
                    $('#optionA').addClass('addBg2');
                @endif


            })
            $('#gridRadios2').on('click', (e) => {
                console.log(e);
                @if ($question->answer == 'option_b')
                    $('#optionB').addClass('addBg');
                @else
                    $('#optionB').addClass('addBg2');
                @endif


            })
            $('#gridRadios3').on('click', (e) => {
                console.log(e);
                @if ($question->answer == 'option_c')
                    $('#optionC').addClass('addBg');
                @else
                    $('#optionC').addClass('addBg2');
                @endif
                // <?php if($question->answer=='option_c'  ) : ?>
                // $('#optionC').addClass('addBg');
                // <?php else: ?>
                // $('#optionC').addClass('addBg2');
                // <?php endif; ?>



            })
            $('#gridRadios4').on('click', (e) => {
                console.log(e);
                @if ($question->answer == 'option_d')
                    $('#optionD').addClass('addBg');
                @else
                    $('#optionD').addClass('addBg2');
                @endif


            })


        })
    </script> --}}

@endsection
