<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>
<body>
<h1>{{$page->title}}</h1>
<div>
    {{$page->content}}
</div>
<form action="/delete">
    <input id="submit" type="submit" value="Страница">
    <input type="hidden" name="id" value="{{$page->id}}">
</form>
<script>
    $(document).ready(function(){
        var form = $('form');

        var url = form.attr('action');
        var id = form.find('input[name="id"]').val();
        url = url + '/' + id;
        form.find('#submit').click(function(){
            console.log(url);
            $.ajax({
                url: url
            }).done(function() {
                location = '/pages';
            });
            return false;
        });
    });
</script>

</body>
</html>