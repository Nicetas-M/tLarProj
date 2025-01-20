@extends('layouts.main')
@section('content')
    <div>
        <p class="mt-2 mb-2">id: {{ $note->id }}</p>
        <p class="mt-2 mb-2">content: {{ $note->content }}</p>
        <p class="mt-2 mb-2">category: {{ $note->category }}</p>
        <p class="mt-2 mb-2">tags:</p>
        @foreach($tags as $tag)
            <p class="mt-2 mb-2" style="margin-left: 10px">{{ $tag->name }}</p>
        @endforeach
        <div class="mt-3">
            <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-primary mb-2">Edit</a>
            <form action="{{ route('notes.destroy', $note->id) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-primary">Delete</button>
            </form>
        </div>
    </div>
@endsection
