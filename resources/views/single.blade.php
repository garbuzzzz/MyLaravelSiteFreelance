@extends('layouts.mylayout')

@section('header')
    @include('header')
@endsection


@section('content')

    {{ session('message') }}

    {{ $allDeals->links('paginate') }}

    <!-- END #fh5co-header -->
    <div class="container-fluid">
        <div class="row fh5co-post-entry single-entry">
            <article class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
                <figure class="animate-box">
                    <img src="{{ asset('images/' . $deal->img) }}" alt="Image" class="img-responsive">
                </figure>
                <span class="fh5co-meta animate-box"><a href="/customerInfo/{{ $deal->user_id }}">{{ $deal->user->name }}</a></span>
                <h2 class="fh5co-article-title animate-box"><a href="single.html">{{ $deal->title }}</a></h2>
                <span class="fh5co-meta fh5co-date animate-box">{{ $deal->date }}</span>

                <div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">
                    <div class="row">


                        <div class="row rp-b">
                            <div class="col-md-12 animate-box">
                                <blockquote>
                                    <p>&ldquo;{{ $deal->description }}&rdquo; <cite>&mdash; name {{ $deal->user->name }}</cite></p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>

    @foreach($comments as $comment)
        <div style="margin:0 25% 0 25%; width:50%;">
            <div style="border: 1px solid darkred; padding: 10px 10px 0px 10px;">
                <span>{{ $comment->user->name }}</span><br>
                <p>{{ $comment->created_at }}</p>
                <p>{{ $comment->comment }}</p>
            </div><br>
        </div>
    @endforeach


    @if(Auth::check())
        <div style="margin:0 25% 0 25%; width:50%;">
            @include('commentForm')
        </div>
    @else
        <div style="margin:0 25% 0 25%; width:50%;">
            <a style="color:black;" href="{{ route('login') }}"><input type="submit" value="Join us to comment)"></a>
        </div>
    @endif

@endsection
