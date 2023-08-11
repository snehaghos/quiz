@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Question</h1>
        {{-- @dd($question) --}}
        <form action="{{ route('question.update',$question->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row my-4">
                <div class="offset-md-2 col-md-8">
                    <select name="subject_id" id="subject_id" class="form-control">
                        <option value="">Select Subject</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ $subject->id==$question->subject_id ?'selected':'' }}>{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row ">
                <div class="offset-md-2 col-md-8">
                    <div class="form-group mb-4 ">
                        <label for="image">Question Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="offset-md-2 col-md-8">
                    <div class="form-group mb-4 ">
                        <label for="question">Question</label>
                        <textarea class="form-control border border-info rounded-2 "
                        name="question" id="question" cols="30" rows="3">{{ old('question') }}{{ $question->question }}</textarea>

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="offset-md-2 col-md-4">
                    <div class="form-group mb-3 border border-info rounded-2">
                        <div class="input-group">
                            <div class="input-group-text d-flex bg-info">
                                 <input class="form-check-input" type="radio"
                                 name="answer" id="gridRadios1" value="option_a" {{ $question->answer=='option_a' ? 'checked' : ''}}>
                                <div class="ms-2" >A</div>
                            </div>
                            <input type="text" class="form-control" name="option_a" placeholder="Option a" value="{{ $question->option_a }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3 border border-info rounded-2">

                        <div class="input-group">
                            <div class="input-group-text d-flex bg-info"> <input class="form-check-input" type="radio"
                                    name="answer" id="gridRadios1" value="option_b"  {{ $question->answer=='option_b' ? 'checked' : ''}}>
                                <div class="ms-2" name="option_b">B</div>
                            </div>
                            <input type="text" class="form-control" name="option_b" placeholder="Option b" value="{{ $question->option_b }}">
                        </div>

                    </div>
                </div>
                <div class="offset-md-2 col-md-4">
                    <div class="form-group mb-3 border border-info rounded-2">
                        <div class="input-group">
                            <div class="input-group-text d-flex bg-info"> <input class="form-check-input" type="radio"
                                    name="answer" id="gridRadios1" value="option_c" {{ $question->answer=='option_c' ? 'checked' : ''}}>
                                <div class="ms-2">C</div>
                            </div>
                            <input type="text" class="form-control" name="option_c" placeholder="Option c" value="{{ $question->option_c }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3 border border-info rounded-2">
                        <div class="input-group">

                            <div class="input-group-text d-flex  bg-info"> <input class="form-check-input" type="radio"
                                    name="answer" id="gridRadios1" value="option_d" {{ $question->answer=='option_d' ? 'checked' : ''}}>
                                <div class="ms-2">D</div>
                            </div>
                            <input type="text" class="form-control" name="option_d" placeholder="Option d" value="{{ $question->option_d }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-2 col-md-8">
                    <button type="submit" class="btn btn-success w-100">Update </button>
                </div>
            </div>
        </form>
    </div>
@endsection
