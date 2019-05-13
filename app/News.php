<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Comment;

class News extends Model
{
    use SoftDeletes;
    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }
}
