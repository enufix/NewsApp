<?php

namespace App;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['description','title','num_upvotes','link'];

}
