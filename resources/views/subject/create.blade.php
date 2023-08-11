@extends('layouts.app')
@section('content')
    <div class="container w-50 border border-2 border-info p-3">
        <h1 class="mt-3 mb-4">Create Subject</h1>
        <form action="{{ route('subject.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="" placeholder="Subject Name" name="name"
                    class="form-control border border-2 border-info mb-4">
                <input type="file" name="image" placeholder="Add Photo"
                    class="form-control mb-4 border border-2 border-info">
                    <textarea name="description" id="" cols="30" rows="10" class="form-control border border-2 border-info mb-4"></textarea>
                <button class="btn btn-info w-100" type="submit">Save</button>
            </div>
        </form>

    </div>
@endsection
