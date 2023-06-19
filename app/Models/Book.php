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

    // scope filter
    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%'.$search.'%')
                    ->orWhere('descriptopn', 'like', '%'.$search.'%')
                    ->orWhere('publication_date', 'like', '%'.$search.'%')
                    ->orWhere('pages', 'like', '%'.$search.'%');
        });

        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, function($query, $author){
            return $query->whereHas('author', function($query) use ($author){
                $query->where('username', $author);
            });
        });
    } 
}
