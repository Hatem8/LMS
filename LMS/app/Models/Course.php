<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return  $this->belongsTo(Category::class);
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
