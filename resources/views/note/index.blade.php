@extends('layouts.main')
@section('content')
    <a href="{{ route('notes.create') }}" class="btn btn-primary">Create</a>
    <div>
        @foreach($notes as $note)
            <div>
                <a href="{{ route('notes.show', $note->id) }}">{{ $note->id }}. {{ $note->content }}</a>
            </div>
        @endforeach
    </div>
@endsection
