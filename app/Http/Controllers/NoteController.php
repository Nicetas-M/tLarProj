<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Category;
use App\Models\NoteTag;
use App\Models\Tag;
use Illuminate\Http\Request;


class NoteController extends Controller {
    protected static $id = 0;

    public function index() {
        $notes = Note::all();
        return view('note.index', ['notes' => $notes]);
    }

    public function create() {
        $categories = Category::all();
        $tags = Tag::all();
        return view('note.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function store() {
        $data = request()->validate([
            'content' => 'string',
            'category_id' => 'integer',
            'tags' => 'array',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $note = Note::create($data);
        foreach ($tags as $tag) {
            NoteTag::firstOrCreate([
                'tag_id' => $tag,
                'note_id' => $note->id
            ]);
        }
        return redirect()->route('notes.index');
    }

    public function show(Note $note) {
        $category = Category::find($note->category_id);
        $noteTags = NoteTag::where('note_id', $note->id)->get();
        $tags = [];
        foreach ($noteTags as $noteTag) {
            $tags[] = Tag::find($noteTag->tag_id);
        }
        //dd($note, $category, $tags, $noteTags);
        //$tags = Tag::get($note->tags());
        return view('note.show', [
            'note' => $note,
            'category' => $category,
            'tags' => $tags
        ]);
    }

    public function edit(Note $note) {
        return view('note.edit', ['note' => $note]);
    }

    public function update(Note $note) {
        $data = request()->validate([
            'content' => 'string'
        ]);
        $note->update($data);
        return redirect()->route('notes.show', $note->id);
    }

    public function destroy(Note $note) {
        $note->delete();
        return redirect()->route('notes.index');
    }

    public function restore() {
        $note = Note::withTrashed()->find(1);
        $note->restore();
        dump('restored');
    }

    public function firstOrCreate() {
        $note = Note::firstOrCreate([
            'content' => 'created note 11'
        ],
            [
                'content' => 'foc created note'
            ]);
        dd($note);
        dd('foc');
    }
}
