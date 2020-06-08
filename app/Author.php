<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'author';

    Protected $guarded = ['id'];

    public function author_books()
    {
    	return $this->hasMany(Book::class, 'author_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'ACTIVE');
    }
}
