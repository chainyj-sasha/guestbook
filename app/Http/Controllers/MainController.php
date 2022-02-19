<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Message;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function insert(Request $request)
    {
        if ($request->has('button')){
            $guest = new Guest;
            $guest->name = $request->name;
            $guest->save();
            $id = $guest->id;

            $message = new Message();
            $message->text = $request->text;
            $message->guest_id = $id;
            $message->save();

            $request->session()->put('flash', 'Запись добавлена успешно!');

            return redirect('http://guestbook.site/');
        }

        $messages = Message::orderBy('created_at', 'desc')->get();

        return view('main.insert', [
            'title' => 'Отзывы',
            'messages' => $messages,
            'flash' => $request->session()->pull('flash'),
        ]);
    }

    public function editMessage(Request $request, $id)
    {
        $message = Message::find($id);

        if ($request->has('button')){
            $message->text = $request->text;
            $message->save();

            $request->session()->put('flash', 'Сообщение отредактировано!');

            return redirect('http://guestbook.site/admin');
        }

        return view('main.edit', [
            'title' => 'Редактировать сообщение',
            'message' => $message,
        ]);
    }

    public function delMessage(Request $request, $id)
    {
        $message = Message::find($id);
        $message->delete();

        $request->session()->put('flash', 'Сообщение удалено!');

        return redirect('http://guestbook.site/admin');
    }

    public function admin(Request $request)
    {
        $messages = Message::orderBy('created_at', 'desc')->get();

        return view('main.admin', [
            'title' => 'страница администратора',
            'flash' => $request->session()->pull('flash'),
            'messages' => $messages,
        ]);
    }
}
