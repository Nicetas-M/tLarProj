<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';

    public function notes() {
        return $this->hasMany(Note::class, 'category_id', 'id');
    }
}
