<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'courses';

    public function categories(){
        return $this->belongsTo(Category::class, 'category', 'id');
    }
    public function sub_cat(){
        return $this->belongsTo(SubCategory::class, 'sub_category', 'id');
    }
}
