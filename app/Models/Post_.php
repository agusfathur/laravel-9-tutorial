<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul post pertama",
            "slug" => "judul-post-pertama",
            "author" => "Agus Fathur Rozi",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, deserunt odio dolorum laudantium assumenda dignissimos, molestias, pariatur facilis quam similique voluptatum ab eligendi molestiae illo."
        ],
        [
            "title" => "Judul post kedua",
            "slug" => "judul-post-kedua",
            "author" => "Sam Agoes",
            "body" => "
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, asperiores? Placeat porro natus consectetur quia amet nemo incidunt commodi expedita non illo, et nihil laborum tempore! Cupiditate deserunt voluptates blanditiis repellat magni commodi fugiat placeat dicta? Ipsum optio, temporibus minus magni nihil accusamus tempore itaque, tenetur nisi autem esse corrupti laudantium aliquam eum expedita fuga molestias hic at ullam. Aliquid vel ipsa fugiat ipsum repellat libero eveniet maxime asperiores assumenda, animi impedit, delectus ducimus perspiciatis odio recusandae eos. Nesciunt iste dignissimos doloribus culpa ad atque aperiam tenetur unde, tempora iusto quos inventore quo. Doloremque corporis impedit quos, illum magni beatae.
        "
        ],

    ];

    public static function all()
    {
        // $this-> properti biasa
        // properti static pakai self::
        // collecction
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        // collecction
        return $posts->firstWhere('slug', $slug);
    }
}