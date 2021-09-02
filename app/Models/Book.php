<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function writer()
    {
        return $this->belongsTo(Writer::class, 'writer_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
}
