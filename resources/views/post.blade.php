@extends('layouts.main')

@section('container')
    <article>

        <h2>{{ $post->title }}</h2>
        {{-- menggunakan htmlspecialchars, mengamankan isi --}}
        {{-- {{ $post->body }} --}}

        {{-- cetak sesuai isinya, pastikan aman --}}
        {!! $post->body !!}

    </article>

    <a href="/posts">Back to posts</a>
@endsection


{{-- Post::create([
'title' => 'Judul ketiga',
'slug' => 'judul-ketiga',
'excerpt' => 'Lorem ipsum kedua',
'body'=> '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid reprehenderit pariatur, in quisquam harum, quidemmollitia similique recusandae dicta, repudiandae fugiat excepturi. Ipsum provident inventore alias necessitatibus.Quoex hic tempore at nesciunt, optio obcaecati voluptate, </p><p>voluptatibus architecto similique cum a ipsam ab repudiandae modi molestiae illo exercitationem quidem blanditiis minus eius non dolorem. Incidunt, nisi recusandae voluptatem nostrum facilis, tempore officia laudantium corrupti quibusdam ducimus autem! Dolore, molestiae fugiat quis sunt dignissimos enim! Tenetur dolorum aspernatur libero quaerat porro! </p>'
])  --}}
