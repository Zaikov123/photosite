<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'photos';
    protected $guarded = false;

    protected $withCount = ['likedUsers'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'photo_id', 'id');
    }
    public function likedUsers(){
        return $this->belongsToMany(User::class, 'photo_user_likes','photo_id','user_id');
    }

}
