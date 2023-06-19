<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'publisher_id',
        'description',
        'publication_date',
        'pages',
    ];

    // relationship with users
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    // relationship with categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // relationship with publishers
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
