@extends('layouts.mylayout')


@section('header')
    @include('header')
@endsection


@section('content')
    @foreach($messages as $message)
        <div style="margin:0 25% 0 25%; width:50%;">
            <div style="padding: 10px 10px 0px 10px; display: inline-block; width: 100%">
                <span>{{ $message->secondUser->name }} | {{ $message->created_at }}</span>
            </div><br><br>
        </div>
        <div style="margin:0 25% 0 25%; width:50%;">
            <div style="border: 1px solid darkred; padding: 10px 10px 0px 10px; display: inline-block; width: 100%">
                <p>{{ $message->message }}</p>
            </div><br><br>
        </div>
    @endforeach


        <div style="margin:0 25% 0 25%; width:50%;">
            <form action="" method="POST">
                @csrf
                <p>Накорябайте еще одно сообщение этому персонажу:</p>
                <textarea style="width: 700px; height:300px; border: 1px solid burlywood" name="newMessage"></textarea>
                <input type="submit" value="Отправить" name="go">
            </form>

        </div>


@endsection






