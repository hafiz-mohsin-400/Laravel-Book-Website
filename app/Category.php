<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    Protected $guarded = ['id'];


    public function category_books()
    {
        return $this->hasMany(Book::class, 'category_id');
    }
    public function scopeActive($query)
    {
    	return $query->where('status', 'ACTIVE');
    }

    
}
