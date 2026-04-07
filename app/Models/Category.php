<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
protected $table = 'categories';
protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'status'
    ];

    // Subcategories Relation
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
