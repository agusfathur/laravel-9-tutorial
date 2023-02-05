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

    // relationship ke tabel category
    // nama method harus sama dengan nama model
    public function category()
    {
        // one to one cardinality
        // return posts.category_id
        return $this->belongsTo(Category::class);
    }

}