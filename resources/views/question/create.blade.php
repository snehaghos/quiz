@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Question</h1>
        <form action="{{ route('question.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="offset-md-2 col-md-8">
                    <select name="subject_id" id="subject_id" class="form-control">
                        <option value="">Select Subject</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ $subject->id==old('subject_id') ?'selected':'' }}>{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row ">
                <div class="offset-md-2 col-md-8">
                    <div class="form-group mb-4 ">
                        <label for="question">Add Image</label>
                        <input type="file" name="image" class="form-control" id="">
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="offset-md-2 col-md-8">
                    <div class="form-group mb-4 ">
                        <label for="question">Question</label>
                        <textarea class="form-control border border-info rounded-2 "
                        name="question" id="question" cols="30" rows="3">{{ old('question') }}</textarea>

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="offset-md-2 col-md-4">
                    <div class="form-group mb-3 border border-info rounded-2">
                        <div class="input-group">
                            <div class="input-group-text d-flex bg-info">
                                 <input class="form-check-input" type="radio"
                                 name="answer" id="gridRadios1" value="option_a" checked>
                                <div class="ms-2" >A</div>
                            </div>
                            <input type="text" class="form-control" name="option_a" placeholder="Option a">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3 border border-info rounded-2">

                        <div class="input-group">
                            <div class="input-group-text d-flex bg-info"> <input class="form-check-input" type="radio"
                                    name="answer" id="gridRadios1" value="option_b"  checked>
                                <div class="ms-2" name="option_b">B</div>
                            </div>
                            <input type="text" class="form-control" name="option_b" placeholder="Option b">
                        </div>

                    </div>
                </div>
                <div class="offset-md-2 col-md-4">
                    <div class="form-group mb-3 border border-info rounded-2">
                        <div class="input-group">
                            <div class="input-group-text d-flex bg-info"> <input class="form-check-input" type="radio"
                                    name="answer" id="gridRadios1" value="option_c" checked>
                                <div class="ms-2">C</div>
                            </div>
                            <input type="text" class="form-control" name="option_c" placeholder="Option c">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3 border border-info rounded-2">
                        <div class="input-group">

                            <div class="input-group-text d-flex  bg-info"> <input class="form-check-input" type="radio"
                                    name="answer" id="gridRadios1" value="option_d" checked>
                                <div class="ms-2">D</div>
                            </div>
                            <input type="text" class="form-control" name="option_d" placeholder="Option d">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-2 col-md-8">
                    <button type="submit" class="btn btn-success w-100">Save </button>
                </div>
            </div>
        </form>
    </div>
@endsection
