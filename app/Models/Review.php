<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Review extends Model
{
    use HasFactory;

    public function book()
    {
        // many:1
        return $this->belongsTo(Book::class);
//        return $this->belongsTo(\App\Models\Book::class); // same
//        return $this->belongsTo('App\Models\Book'); // same
    }
}
