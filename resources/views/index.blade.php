<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>My BBS</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>My BBS</h1>
        <ul>
            @forelse ($posts as $post)
                <li>{{ $post }}</li>
            @empty
                <li>No posts yet!</li>
            @endempty
        </ul>
    </div>
</body>
</html>