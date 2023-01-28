<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'description', 'image', 'meta_title', 'meta_descriptin', 'meta_keyword', 'navber_status', 'status', 'created_by'];
public function post(){
        return $this->hasMany(post::class, 'category_id','id');
}

}
