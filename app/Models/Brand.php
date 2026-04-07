<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $fillable = [
        'name',
        'image',
        'description',
        'status',
        'subcategory_id',
        'category_id'
    ];
    public function ParentCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function ChildCategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
}
