<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = [];
    protected $with = ['author'];

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
}
