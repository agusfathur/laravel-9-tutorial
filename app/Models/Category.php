<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relationship
    public function posts()
    {
        // one to many cardinality
        return $this->hasMany(Post::class);
    }

}