<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Agus FATHUR',
            'email' => 'email.com',
            'password' => bcrypt('12345')
        ]);

        User::create([
            'name' => 'Sila',
            'email' => 'email@.com',
            'password' => bcrypt('12345')
        ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::create([
            'title' => 'Judul pertama',
            'slug' => 'judul-pertama',
            'excerpt' => 'Lorem ipsum pertama',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid reprehenderit pariatur, in quisquam harum, quidemmollitia similique recusandae dicta, repudiandae fugiat excepturi. Ipsum provident inventore alias necessitatibus.Quoex hic tempore at nesciunt, optio obcaecati voluptate, </p><p>voluptatibus architecto similique cum a ipsam ab repudiandae modi molestiae illo exercitationem quidem blanditiis minus eius non dolorem. Incidunt, nisi recusandae voluptatem nostrum facilis, tempore officia laudantium corrupti quibusdam ducimus autem! Dolore, molestiae fugiat quis sunt 
            dignissimos enim! Tenetur dolorum aspernatur libero quaerat porro! </p>',
            'category_id' => 1,
            'user_id' => 1
        ]);

        Post::create([
            'title' => 'Judul kedua',
            'slug' => 'judul-ke-dua',
            'excerpt' => 'Lorem ipsum kedua',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid reprehenderit pariatur, in quisquam harum, quidemmollitia similique recusandae dicta, repudiandae fugiat excepturi. Ipsum provident inventore alias necessitatibus.Quoex hic tempore at nesciunt, optio obcaecati voluptate, </p><p>voluptatibus architecto similique cum a ipsam ab repudiandae modi molestiae illo exercitationem quidem blanditiis minus eius non dolorem. Incidunt, nisi recusandae voluptatem nostrum facilis, tempore officia laudantium corrupti quibusdam ducimus autem! Dolore, molestiae fugiat quis sunt 
            dignissimos enim! Tenetur dolorum aspernatur libero quaerat porro! </p>',
            'category_id' => 1,
            'user_id' => 1
        ]);

        Post::create([
            'title' => 'Judul ketiga',
            'slug' => 'judul-ke-tiga',
            'excerpt' => 'Lorem ipsum ketiga',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid reprehenderit pariatur, in quisquam harum, quidemmollitia similique recusandae dicta, repudiandae fugiat excepturi. Ipsum provident inventore alias necessitatibus.Quoex hic tempore at nesciunt, optio obcaecati voluptate, </p><p>voluptatibus architecto similique cum a ipsam ab repudiandae modi molestiae illo exercitationem quidem blanditiis minus eius non dolorem. Incidunt, nisi recusandae voluptatem nostrum facilis, tempore officia laudantium corrupti quibusdam ducimus autem! Dolore, molestiae fugiat quis sunt 
            dignissimos enim! Tenetur dolorum aspernatur libero quaerat porro! </p>',
            'category_id' => 2,
            'user_id' => 1
        ]);

        Post::create([
            'title' => 'Judul ke empat',
            'slug' => 'judul-ke-empat',
            'excerpt' => 'Lorem ipsum keampar',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid reprehenderit pariatur, in quisquam harum, quidemmollitia similique recusandae dicta, repudiandae fugiat excepturi. Ipsum provident inventore alias necessitatibus.Quoex hic tempore at nesciunt, optio obcaecati voluptate, </p><p>voluptatibus architecto similique cum a ipsam ab repudiandae modi molestiae illo exercitationem quidem blanditiis minus eius non dolorem. Incidunt, nisi recusandae voluptatem nostrum facilis, tempore officia laudantium corrupti quibusdam ducimus autem! Dolore, molestiae fugiat quis sunt 
            dignissimos enim! Tenetur dolorum aspernatur libero quaerat porro! </p>',
            'category_id' => 2,
            'user_id' => 2
        ]);
    }
}