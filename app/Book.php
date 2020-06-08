<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
    Protected $guarded = ['id'];
    
    public function author()
    {
    	return $this->belongsTo(Author::class, 'author_id');
    }
    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'ACTIVE');
    }

}
