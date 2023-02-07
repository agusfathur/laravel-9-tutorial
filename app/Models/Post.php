<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // yang dapat diisi
    // protected $fillable = [
    //     'title',
    //     'excerpt',
    //     'body'
    // ];

    // tak boleh disii
    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    // search filter
    public function scopeFilter($query, array $filters)
    {
        // ?? ternary isset
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });

        // filter search relasi
        $query->when($filters['category'] ?? false, function ($query, $category) {
            // punya relasi ke 'category'
            return $query->whereHas(
                'category',
                function ($query) use ($category) {
                    $query->where('slug', $category);
                }
            );
        });
        // arrow function
        $query->when(
            $filters['author'] ?? false,
            fn($query, $author) =>
            $query->whereHas(
                'author', fn($query) =>
                $query->where('username', $author)
            )
        );
    }

    // relationship ke tabel category
    // nama method harus sama dengan nama model
    public function category()
    {
        // one to one cardinality
        // return posts.category_id
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}