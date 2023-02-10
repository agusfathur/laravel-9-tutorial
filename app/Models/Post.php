<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    // yang dapat diisi
    // protected $fillable = [
    //     'title',
    //     'excerpt',
    //     'body'
    // ];

    // tak boleh disii
    protected $guarded = ['id'];

    // agar melakukan eager loading
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
            fn ($query, $author) =>
            $query->whereHas(
                'author',
                fn ($query) =>
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
        // one to one
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     * routr mencari slug
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
