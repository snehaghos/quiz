@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/gameplay-index.css') }}">
    <div class="st_quiz_wrapper ">
        <div class="startq_header text-center pt-5">Choose Your Quiz</div>
        <div class="row justify-content-center gap-3">
            @forelse ($subjects as $subject)

                <div class="col-md-4 "  style="width: 350px;height:400px;">

                    <div data-sid="{{ $subject->id }}" class="st_cards card  align-items-center  m-5 mx-auto  h-75" style="">
                        <img data-sid="{{ $subject->id }}" src="{{ asset('upload/subject') . '/' . $subject->image }}" class="img-fluid card-img h-100" alt=""
                            width="200" >
                        <div data-sid="{{ $subject->id }}" class="startq_btn position-absolute" i >{{ $subject->name }}</div>
                    </div>

                </div>
            @empty

            @endforelse

        </div>


    </div>
    <script>
        $(document).ready(function(){
            $('.st_cards').on('click',(e)=>{
                // console.log(e.target.attr);
                var id=$(e.target).attr('data-sid');
                // console.log(id);
                var url="{{ route('gameplay.index',':id') }}";

                url=url.replace(':id',id);
                console.log(url);
                location.href=url;
            })
        })

    </script>
@endsection
