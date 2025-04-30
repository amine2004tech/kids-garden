<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'difficulty_level',
        'content',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'difficulty_level' => 'integer'
    ];
}
