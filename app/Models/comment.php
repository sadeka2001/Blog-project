<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table='comments';
    protected $fillable = ['post_id', 'user_id' , 'comment_body'];
}
