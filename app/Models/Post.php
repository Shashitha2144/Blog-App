<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'status',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(comment::class);
    }

    public function categories(){
        return $this->belongsToMany(category::class);
    }

}
