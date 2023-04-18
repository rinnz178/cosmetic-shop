<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name', 'detail', 'image', 'skin_type', 'brand', 'price', 'quantity', 'category_id', 'skin_care_benefits'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getTotalLikesAttribute()
    {
        return $this->likes;
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function hasLiked($user_id)
    {
        return $this->likes()->where('user_id', $user_id)->exists();
    }
}
