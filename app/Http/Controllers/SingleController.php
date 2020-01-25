<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Deal;
use App\Comment;
use Route;

// этот контроллер для того, чтобы отображать одно объявление
class SingleController extends Controller
{

    public function show($id) // сюда передается айди объявления. В таблице по нему можно вытащить юзера
    {
        $deal = Deal::find($id);
        $comments = Comment::where('deal_id', '=', $id)->get(); // из таблицы комментариев, которая тоже связана с таблицей объявлений,
        // достается комментарии на это объявления.
        $allDeals = Deal::paginate(2); // так делается пагинация. Это передается в представление, и там с помощью специального метода показывается пагинация, и можно передавать определенное представление, как именно пагинация будет выглядеть.
        $authId = Auth::id();   // так достается авторизированный пользователь.


        return view('single', ['allDeals' => $allDeals, 'deal' => $deal, 'comments' => $comments, 'id' => $id, 'authId' => $authId]);
    }

    public function comment(Request $request, $id) // этот метод ловит уже отправленный комментарий
    {
        if($request->isMethod('post'))
        {
            $comment = new Comment; // создается новый комментарий и добавляется в БД
            $comment->comment = $request->comment;
            $comment->user_id = Auth::id();
            $comment->deal_id = $id;
            $comment->save();

           /* $deal = Deal::find($id);
            $comments = Comment::where('deal_id', $id)->get();*/
            return redirect()->back()->with('message', 'Ваш коммент добавлен успешно!'); // можно и так!!!
            //return route('single', ['id' => $id])->with('message', 'Ваш коммент добавлен успешно!'); // можно и так!!!
        }
    }
}
