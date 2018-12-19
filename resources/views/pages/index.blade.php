<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .delete{
            border: 1px solid #333; /* Рамка */
            display: inline-block;
            padding: 5px 15px; /* Поля */
            text-decoration: none; /* Убираем подчёркивание */
            color: #000; /* Цвет текста */
        }
       .delete:hover {
            box-shadow: 0 0 5px rgba(0,0,0,0.3); /* Тень */
            background: linear-gradient(to bottom, #ffff00, #e9e9ce); /* Градиент */
            color: #a00;
        }
    </style>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>
<body>
<ul>
    @foreach($pages as $page)
        <li>
            <a href="pages/{{$page->id}}">
                {{$page->title}}
            </a>
            <a href="delete/{{$page->id}}" class="delete">delete </a>
        </li>
    @endforeach
</ul>
<div align="center">

{{ Form::open(array('url' => 'create', 'method' => 'post', 'id' =>'form1')) }}
    <label>Форма</label><br/>
    <input type="text" name="title" placeholder="Title"/>
    <label>title</label><br/>
    <input type="text" name="alias" placeholder="Alias"/>
    <label>alias</label><br/>
    <textarea name="content" class="content" cols="30" rows="10" placeholder="Text"></textarea><br/>
    <label>Text</label><br/>
    <br/>
    <input type="submit" name="done" value="Отправить"/>
{{ Form::close() }}
</div>
<script>
    $(document).ready(function () {
        var del = $('.delete');
            del.each(function(){
                var remove = $(this);
                var url = remove.attr('href');
                remove.click(function(){
                    $.ajax({
                        url: url
                    }).done(function() {
                        remove.parent().detach();
                    });
                    return false;
                });
            });


        $('#form1').submit( function (event) {
            event.preventDefault();
            $.post( "/create",{
                _token: $('[name="_token"]').val(),
                title: $('[name="title"]').val(),
                alias: $('[name="alias"]').val(),
                content: $('.content').val(),
            }).done(function( data ) {
                console.log(data);
                //$( ".result" ).html( data );
                var li = "<li><a href='/pages/"+data.id+"'>" + data.title+
                    "</a> <a href='/delete/"+data.id+"' class=\"delete\">delete </a> </li>";

                $('ul').append(li);
            });
            return false;
        });
    });


</script>
</body>

</html>