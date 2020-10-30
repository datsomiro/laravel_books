<?php

namespace App\Models;

use App\Models\Genre;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function reviews()
    {
        // 1:many
        return $this->hasMany(Review::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
