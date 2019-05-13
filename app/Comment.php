<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\News;
use App\User;

class Comment extends Model
{
    use SoftDeletes;
    public function new()
    {
    	return $this->belongsTo(News::class);
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
