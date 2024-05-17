<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

     protected $table = "book";
     protected $primaryKey = "book_id";
     protected $fillable = [
        'title',
        'author',
        'book_number',
        'genre',
        'availability_status',
     ];
}
