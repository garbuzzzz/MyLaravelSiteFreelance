<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deal;
use App\Http\Requests\FormValidationRequest;
use Auth;

class AddController extends Controller
{
    public function showForm() { // здесь просто показывается страница с оформленной формой
        return view('form');
    }

    public function addDeal(Request $request, FormValidationRequest $formValidationRequest) {
        // Это специальный класс валидации, который создается предварительно (смотри тему валидация),
        // и в этом классе прописаны правила валидации. Если мы сюда его передаем, предполагается, что ниже написанное будет проходить валидацию
        if($request->isMethod('post')) {
            if($request->has('register'))
            {
                // Если была нажата кнопка отправки, то создается новое объявление,
                $deal = new Deal;
                $deal->title = $request->title;
                $deal->description = $request->description;
                $id = Auth::id();
                $deal->user_id = $id;
                $deal->date = date('Y-m-d H:i:s', strtotime("now")); // наверно можно было бы использовать просто created at

                // Здесь делается загрузка фотографии. В форме должен быть специальный атрибут
                if($request->hasFile('image')) {
                    // Если пришла фотка, то файл копируется прямо в файловую структуру фреймворка специальным методом
                    $file = $request->file('image');
                    $file->move(public_path() . '/images', $_FILES['image']['name']);
                } else {
                    // если нет, выкидывает назад
                    return redirect()->back()->with('message', 'Вы не загрузили фотографию');
                }
                $deal->img = $_FILES['image']['name'];
                // сохраняем в БД новое объявление
                $deal->save();
                return redirect()->route('home');
            }
        }
    }
}




