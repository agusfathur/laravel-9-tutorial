<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //      Post::create([
    // 'title' => 'Judul ke empat',
    // 'excerpt' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Modi, hic!',
    // 'body'=> '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid reprehenderit pariatur, in quisquam harum,
    //     quidemmollitia similique recusandae dicta, repudiandae fugiat excepturi. Ipsum provident inventore alias
    //     necessitatibus.Quoex hic tempore at nesciunt, optio obcaecati voluptate, </p>
    // <p>voluptatibus architecto similique cum a ipsam ab repudiandae modi molestiae illo exercitationem quidem blanditiis
    //     minus eius non dolorem. Incidunt, nisi recusandae voluptatem nostrum facilis, tempore officia laudantium corrupti
    //     quibusdam ducimus autem! Dolore, molestiae fugiat quis sunt dignissimos enim! Tenetur dolorum aspernatur libero
    //     quaerat porro! </p>'
    // ])

    // yang dapat diisi
    // protected $fillable = [
    //     'title',
    //     'excerpt',
    //     'body'
    // ];

    // tak boleh disii
    protected $guarded = ['id'];

}