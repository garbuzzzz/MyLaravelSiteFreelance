@extends('layouts.mylayout')


@section('header')
    @include('header')
@endsection


@section('content')
    <div style="margin:0 25% 0 25%; width:50%;display: inline-block;">
        {{session('message')}}
        <div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">
            <div class="row">
                <div class="row rp-b">
                    <div class="col-md-12 animate-box">
                        <blockquote>
                            <p>Как зовут персонажа  |  {{ $user->name }} </p>
                            <p>Когда зарегистрировался  |  {{ $user->created_at }} </p>
                            <p>Написать персонажу личное сообщение:</p>
                            <form action="" method="POST">
                                @csrf
                                <textarea style="width: 700px; height:300px; border: 1px solid burlywood" name="message"></textarea>
                                <input type="submit" value="Отправить" name="submit">
                            </form>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




