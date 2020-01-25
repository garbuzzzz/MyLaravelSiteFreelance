<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Message;
use Auth;

class DialogsController extends Controller
{
    public function allDialogs()
        // показать все диалоги для конкретного авторизированного пользователя
        // сюда ничего не передается, поскольку айди авторизированного пользователя мы можем получить просто
    {
        $authId = Auth::id();
        $messages = Message::where('first_user_id', $authId)->get()->unique('second_user_id');
        // вот именно так!! и аргументом передается, по какому именно полю выбирается уникальное значение.
        // уникальный здесь нужен для того, чтобы не показывать несколько одинаковых пользователей на странице
        return view('dialogs', ['messages' => $messages]);
    }

    public function showDialog($id)
        // страница показывает ленту переписки с конкретным пользователем
        // здесь нужен айди, именно того, с кем переписка
    {
        $authId = Auth::id();
        $secondId = $id;
        // выполняется поиск и сортируется по времени
        $messages = Message::where('first_user_id', $authId)
                            ->where('second_user_id', $secondId)
                            ->orderBy('created_at', 'desc')
                            ->get();
        return view('dialog', ['messages' => $messages]);
    }

    public function addMessage(Request $request, $id)
    {
        // метод на проверку отправленной формы методом post
        $authId = Auth::id();
        $secondId = $id;

        if($request->has('newMessage')) {
            // здесь было бы неплохо вообще проверить, что форма отправлена методом Post
            $newMessage = new Message;
            $newMessage->message = $request->newMessage;
            $newMessage->first_user_id = $authId;
            $newMessage->second_user_id = $secondId;
            $newMessage->save();
            // ну просто сохраняем сообщение в базу.
        }

        return redirect()->back();
    }
}




