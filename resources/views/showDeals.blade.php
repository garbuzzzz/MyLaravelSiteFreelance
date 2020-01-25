@extends('layouts.mylayout')


@section('header')
    @include('header')
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row fh5co-post-entry">
            @foreach($deals as $deal)
                <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                    <figure>
                        <a href="/single/{{ $deal->id }}"><img src="images/{{ $deal->img }}" alt="Image" class="img-responsive"></a>
                    </figure>
                    <span class="fh5co-meta"><a href="single.html">{{ $deal->user->name }}</a></span>
                    <h2 class="fh5co-article-title"><a href="single.html">{{ $deal->title }}</a></h2>
                    <span class="fh5co-meta fh5co-date">{{ $deal->date }}</span>
                </article>
            @endforeach
        </div>
    </div>
@endsection





