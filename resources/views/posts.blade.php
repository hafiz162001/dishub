<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
</head>
<body>
    <h1>Daftar Produk</h1>

    @if($posts->count() > 0)
        <ul>
            @foreach($posts as $post)
                <li>
                    <strong>{{ $post->title }}</strong><br>
                    {{ $post->content }}
                </li>
            @endforeach
        </ul>
    @else
        <p>Tidak ada produk tersedia.</p>
    @endif
</body>
</html>
