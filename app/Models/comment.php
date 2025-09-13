<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
    ];

    public function projects(){
        return $this->belongsTo(Post::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

}
