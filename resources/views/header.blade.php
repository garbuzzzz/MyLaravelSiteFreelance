<div class="container-fluid">
    <div class="row">
        <ul class="fh5co-social">
            @if(Auth::check())
                <li><a href="{{ route('addDeal') }}">add your deal</a></li><br>
                @if(Route::current()->getName() == 'single' and $deal->user_id != $authId)
                    <li><a href="/customerInfo/{{ $deal->user_id }}">contact customer</a></li><br>
                @endif
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        {{ __('logout') }}
                    </a></li><br>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <li><a href="/login">Login</a></li><br>
            @endif
                @if(Route::current()->getName() !== 'home')
                    <li><a href="/"> MAIN </a></li>
                @endif
        </ul>
        <div class="col-lg-12 col-md-12 text-center">
            <h1 id="fh5co-logo"><a href="index.html">Freelance<sup>TM</sup></a></h1>
        </div>
    </div>
</div>
