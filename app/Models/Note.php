<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use SoftDeletes;

    protected $table = 'notes';
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'note_tags', 'note_id',  'tag_id');
    }
}
