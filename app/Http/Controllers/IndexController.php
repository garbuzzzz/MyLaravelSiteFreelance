<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deal;


class IndexController extends Controller
{
    // этот метод показывает на экран все объявления, вне зависимости, авторизирован ли пользователь или нет.
    public function show() {
        $deals = Deal::all(); // вытаксиваем все объявления
        return view('showDeals', ['deals' => $deals]);
    }
}


