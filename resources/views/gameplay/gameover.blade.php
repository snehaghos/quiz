@extends('layouts.app')
@section('content')
    <div class="container w-50 border border-success border-3 p-5">
        <link rel="stylesheet" href="{{ asset('css/gameplay-index.css') }}">


            <div style="font-size: 65px; font-weight:700;" class="text-center  text-danger">GAME OVER</div>
            <div class="row justify-content-center mb-3">
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

            <h4 class="text-center">
                Correct answer {{ $right_answer }} out of {{ $total_answer }}
            </h4>
            <h4 class="text-center text-info fx-bold">
                @if($right_answer==0)
                    <h2>Very bad</h2>
                    <div style="font-size:65px; ">☹️</div>

                @elseif($right_answer==1)
                    Better Luck Next Time
                    <div style="font-size:65px; ">🙂</div>

                @elseif($right_answer==2)
                    Not Bad
                    <div style="font-size:65px; ">😃</div>

                @elseif($right_answer==3)
                    <h2>Good</h2>
                    <div style="font-size:65px; ">🥰</div>
                @elseif($right_answer==4)
                    <h3>Very Good</h3>
                    <div style="font-size:65px; ">🥳</div>

                @else
                    <h2>Outstanding</h2>
                    <div style="font-size:65px; ">🤩</div>

                @endif
            </h4>
            {{-- <div class="mx-auto">
            <img src="/images/gameover.png" width="150" height="150" alt="" >
        </div> --}}
            <div class="row mt-5">
                <div class="col-md-4">
                    <a href="" class="btn btn-success w-100">Try Again</a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('home') }}" class="btn btn-success w-100 ">Back</a>
                </div>
                <div class="col-md-4">
                    <a href="" class="btn btn-success w-100">Restart </a>
                </div>
            </div>

    </div>
    {{-- <script type="text/javascript">
        $(document).ready(() => {
            @if ($is_correct == '1')
            $('#totalCount').add('3');
            @else
            $('#totalCount').add('0');
            @endif


        })
    </script> --}}
@endsection
