@extends('layout.app')

@section('title')
    {{ $title }}
@endsection

@section('content')

    @foreach($messages as $message)
       <p>{{ $message->guest['name'] }}. {{ $message->text }}.  Дата: {{ $message->created_at }}</p>

    @endforeach

    <form action="" method="POST">
        @csrf
        <input  name="name" type="text" placeholder="Ваше имя"><br><br>
        <textarea name="text" id="" cols="30" rows="10" placeholder="Сообщение"></textarea><br>
        <input type="submit" name="button">
    </form>
@endsection
