@extends('layouts.main')
@section('content')
    <div class="mt-3">
        <form action="{{ route('notes.update', $note->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <h3 for="title">Editing:</h3>
                <p>{{ $note->content }}</p>
                <input
                    type="text"
                    name="content"
                    class="form-control mt-2 mb-2"
                    id="title"
                    placeholder="Title"
                    value="{{ $note->content }}"
                >
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection
