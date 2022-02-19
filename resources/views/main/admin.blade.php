<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>

@if(isset($flash))
    {{ $flash }}
@endif

<table border="1">
    <tr>
        <th>user_id</th>
        <th>user_name</th>
        <th>user_message</th>
        <th>edit post</th>
        <th>delete post</th>
    </tr>
    @foreach($messages as $message)
        <tr>
            <td>{{ $message->guest['id'] }}</td>
            <td>{{ $message->guest['name'] }}</td>
            <td>{{ $message->text }}</td>
            <td><a href="http://guestbook.site/edit/{{ $message->id }}" style="color: #003fff">edit</a></td>
            <td><a href="http://guestbook.site/delete/{{ $message->id }}" style="color: #af2c2c">delete</a></td>
        </tr>
    @endforeach
</table>

</body>
</html>
