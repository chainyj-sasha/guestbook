<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Message;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function show(Request $request)
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

        return view('main.main', [
            'title' => 'Отзывы',
            'messages' => $messages,
            'flash' => $request->session()->pull('flash'),
        ]);
    }
}
