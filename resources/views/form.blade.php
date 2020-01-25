@extends('layouts.mylayout')

@section('header')
    @include('header')
@endsection

@section('content')
    <div style="margin:0 25% 0 25%; width:50%;">
        {{ session('message') }}
        @if(count($errors) > 0)
            {{--эта штука связана с валидацией. При создании валидации, а в частности при возникновении ошибок ввода юзером, создается
            такая переменная, к которой тут можно получить доступ. Кстати, в контроллере к ней доступ получить не получилось. --}}
            @foreach($errors->all() as $error)
                <ul style="color: red">
                    <li>{{ $error }}</li>
                </ul>
            @endforeach
        @endif
        <form action="" method="POST" enctype="multipart/form-data"> {{--этот атрибут нужен специально для отправки файла--}}
            @csrf
            <p>Type the title of your deal:</p>
            <input style="width: 700px; border: 1px solid burlywood" name="title">
            <p>Type the description of your deal:</p>
            <textarea style="width: 700px; height:300px; border: 1px solid burlywood" name="description"></textarea>
            <p>Select some imagine:
                <input type="file" name="image">   {{--вот инпутом такого типа подгружается на сервер картинка--}}
            </p>
            <input type="submit" value="Register" name="register">
        </form>
    </div>
@endsection



