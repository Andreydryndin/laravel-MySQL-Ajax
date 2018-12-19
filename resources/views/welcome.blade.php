<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>
<body>
<ul>
    @foreach($pages as $page)
        <li>{{  $page->title }}</li>
    @endforeach
</ul>
</body>
</html>