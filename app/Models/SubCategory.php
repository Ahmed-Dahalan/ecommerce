<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(category::class,'category_id','id');
    }

    public function subSubCategory()
    {
        return $this->hasMany(subSubCategory::class, 'subcategory_id', 'id');
    }
}
