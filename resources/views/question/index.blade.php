@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Question Index</h1>
        <a class="btn btn-info" href="{{ route('question.create') }}">Create Question</a>
        <div class="card my-4 p-4 bg-primary">
            <form action="">
                <div class="d-flex">
                    <div class="col-md-4">
                        <select name="subject_id" id="subject_id" class="form-control">
                            <option value="">Select Subject</option>
                            @foreach ($subjects as $subject)
                                <div class="row">
                                    <option value="{{ $subject->id }}"
                                        {{ $subject->id == old('subject_id') ? 'selected' : '' }}>
                                        {{ $subject->name }}</option>

                                </div>
                            @endforeach
                        </select>

                    </div>
                    <div class="search btn btn-light ms-4"><i class="fa fa-search"></i> Search</div>
                </div>
            </form>
        </div>
        <div class="card" id="resultPanel">
            {{-- @include('question.partials.index_table') --}}
        </div>
    </div>
    <script>
        $('.search').on('click', () => {
            var subject_id = $('#subject_id').val();

            if (subject_id == '') {
                console.log('choose your subject');
                return;
            }
            var url ="{{ route('start_quiz_search',':id') }}";
            url=url.replace(':id',subject_id);
            console.log(url);
            $.ajax({
                url:url,
                type:'GET',
                success:function(response){
                    if(response.status==200){
                        $('#resultPanel').html(response.htmlData);
                    }
                    else{
                        $('#resultPanel').html('No Data Found');
                    }
                   // console.log(response.htmlData);
                }

            });






        });
    </script>
@endsection
