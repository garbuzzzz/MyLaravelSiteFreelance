<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use Auth;

class CustomerInfoController extends Controller
{
    public function index($id)
        // просто показываем на экран данные о юзере, для чужого юзера, то есть это не личный кабинет
    {
        $user = User::find($id);
        $authId = Auth::id();
        if($id != $authId) {
            // если переданное айди совпадает с авторизированным, то значит это личный кабинет, а его я не делал,
            // соответственно видим сообщение об ошибке.
            return view('customerInfo', ['user' => $user]);
        } else {
            return redirect()->back()->with('message', 'Ну тебе же незачем смотреть свои данные здесь. Иди в личный кабинет, который кстати не реализован');
        }
    }

    public function addMessage(Request $request, $id)
    {
        // Если была отправка формы, то происходит сохранение сообщения в БД
        if ($request->isMethod('post'))
        {
            if(!empty($request->message))
            {
                $message = $request->message;
                $newMessage = new Message;
                $newMessage->message = $message;
                $first_user_id = Auth::id(); // причем отправитель известен всегда: это авторизированный юзер
                $second_user_id = $id; // а вот получатель дается нам из маршрута
                // таблицы юзерс и мессаджес таким образом связаны один (сообщение) имеет одного (юзера),
                // и нас в этой связи интересует только получатель, поэтому все просто и о конфликтах даже не пахнет
                $newMessage->first_user_id = $first_user_id;
                $newMessage->second_user_id = $second_user_id;
                $newMessage->save();

                $secondUserName = $newMessage->secondUser->name;
                // обращаю внимание, скобки не нужны после secondUser
                return redirect()->route('dialogs')->with('message', "$secondUserName прочитает ваш бред. Но это не точно.");
            } else {
                return redirect()->back()->with('message', 'Ну так напишите чтонибудь, раз начали');
            }
        }
    }
}
