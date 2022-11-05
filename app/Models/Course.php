<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
