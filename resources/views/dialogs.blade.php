@extends('layouts.mylayout')


@section('header')
    @include('header')
@endsection


@section('content')
    {{ session('message') }}
    @foreach($messages as $message)
        <div style="margin:0 25% 0 25%; width:50%;">
            <div style="border: 1px solid darkred; padding: 10px 10px 0px 10px; display: inline-block; width: 100%">
                <a href="{{ route('dialog', $message->secondUser->id) }}">{{ $message->secondUser->name }}</a>
            </div><br><br>
        </div>
    @endforeach
@endsection






