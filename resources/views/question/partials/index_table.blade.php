<table class="table table-responsive">
    <thead>
        <tr>
            <th>Sl</th>
            <th>Image</th>
            <th>Question</th>
            <th>A</th>
            <th>B</th>
            <th>C</th>
            <th>D</th>
            <th>action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($questions as $key => $question)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                    <img src="{{ $question->image ? asset('upload/question_image') . '/' . $question->image : asset('images/no-image.jpg') }}"
                        class="img-fluid" alt="" width="50" height="50">
                </td>
                <td>{{ __($question->question) }}</td>

                <td>
                    {!! $question->answer == 'option_a' ? '<i class="fa-solid fa-circle-check" style="color: #aeff00;"></i>' : '' !!} {{ __($question->option_a) }}
                    <img src="{{ $question->option_a_img ? asset('upload/option_image') . '/' . $question->option_a_image : asset('images/no-image.jpg') }}"
                        class="img-fluid" alt="" width="50" height="50">
                </td>
                <td>
                    {!! $question->answer == 'option_b' ? '<i class="fa-solid fa-circle-check" style="color: #aeff00;"></i>' : '' !!} {{ __($question->option_b) }}
                    <img src="{{ $question->option_b_img ? asset('upload/option_image') . '/' . $question->option_b_image : asset('images/no-image.jpg') }}"
                        class="img-fluid" alt="" width="50" height="50">
                </td>
                <td>
                    {!! $question->answer == 'option_c' ? '<i class="fa-solid fa-circle-check" style="color: #aeff00;"></i>' : '' !!} {{ __($question->option_c) }}
                    <img src="{{ $question->option_c_img ? asset('upload/option_image') . '/' . $question->option_c_image : asset('images/no-image.jpg') }}"
                        class="img-fluid" alt="" width="50" height="50">
                </td>
                <td >
                    {!! $question->answer == 'option_d' ? '<i class="fa-solid fa-circle-check" style="color: #aeff00;"></i>' : '' !!} {{ __($question->option_d) }}
                    <img src="{{ $question->option_d_img ? asset('upload/option_image') . '/' . $question->option_d_image : asset('images/no-image.jpg') }}"
                        class="img-fluid" alt="" width="50" height="50">
                </td>
                <td>
                    <a href="{{ route('question.edit', $question->id) }}" class="btn btn-info"><i
                            class="fa fa-edit"></i></a>
                    <a href="{{ route('question.delete', $question->id) }}" class="btn btn-danger"><i
                            class="fa fa-trash"></i></a>
                </td>


            </tr>
        @endforeach
    </tbody>

</table>
