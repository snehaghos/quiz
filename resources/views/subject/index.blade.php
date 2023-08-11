@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Subject Index</h1>
        <a href="{{ route('subject.create') }}">
            <div class="btn btn-info">
                Create Subject
            </div>
        </a>
        <table class="table ">
            <tr >
                <th >Sl</th>
                <th>Subject Name</th>
                <th>Image</th>
                <th>Description
                </th>
                <th>Action</th>

            </tr>
            @foreach ($subjects as $key => $subject)
                <tr>
                    <td>{{ $subject->id }}</td>
                    <td>{{ $subject->name }}</td>
                    <td> <img src="{{ asset('upload/subject') . '/' . $subject->image }}" class="img-fluid" alt=""
                            width="200" height="200"></td>
                    <td style="width: 400px;">{{ $subject->description }}</td>
                    <td>
                        <a href="{{ route('subject.edit', $subject->id) }}">
                            <button class="btn btn-success me-2"><i class="fa fa-edit"></i></button>
                        </a>
                        <a href="{{ route('subject.delete', $subject->id) }}">
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
