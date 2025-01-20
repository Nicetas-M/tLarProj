@extends('layouts.main')
@section('content')
    <div class="mt-3">
        <form action="{{ route('notes.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="note">Note</label>
                <input type="text" name="content" class="form-control mt-2 mb-2" id="note" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" class="form-control" id="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tag">Tags</label>
                <select multiple name="tags[]" class="form-control" id="tag">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-2 mb-2">Create</button>
        </form>
    </div>
@endsection
