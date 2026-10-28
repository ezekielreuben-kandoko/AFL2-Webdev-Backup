<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'path'];

    public function getUrlAttribute(): string
    {
        return asset('storage/'.$this->path);
    }
}
