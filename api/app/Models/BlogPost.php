<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'title',
        'description',
        'text',
    ];

    public function blogmedia() {
        return $this->hasMany((BlogMedia::class));
    }
}
