<?php

namespace App\Models;

use App\Models\categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['category_id', 'name', 'slug', 'description', 'yt_frame', 'meta_title', 'meta_description', 'meta_keyword', 'status', 'created_by'];

       public function category()
    {
        return $this->belongsTo(categories::class, 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

}
