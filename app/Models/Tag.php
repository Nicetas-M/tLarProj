<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    public function notes() {
        return $this->belongsToMany(Note::class, 'note_tags', 'tag_id',  'note_id');
    }
}
