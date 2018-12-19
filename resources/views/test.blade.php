<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Document </title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>
<body>
@foreach ($pages as $page)
    <ul>
        <li>
            {{ $page }}
        </li>
    </ul>
@endforeach
<div id="test" onclick="$('test').hide ()">Test</div>
</body>
</html>