<nav class="navbar navbar-expand-lg navbar-light mb-4 navbar-fixed-top navbar-inverse">
    <div class="container">
        <a class="navbar-brand d-block d-sm-none" href="{{url('/')}}"><img src="{{url('logo.png')}}" width="150px"></a>
        <div class="col-md-3 d-none d-md-block">
            <a class="navbar-brand" href="{{route('index')}}"><img src="{{url('logo.png')}}" width="150px"></a>
        </div>
        <div class="col-md-6 d-none d-md-block">
            <form action="{{route('search')}}" method="GET">
                <input class="form-control search-form col-md-12 col-6" type="input" name="search" value="{{Request::get('search')}}" placeholder="Search Restoran"
                    aria-label="Search">
            </form>
        </div>
        <div class="col-md-3 align-content-right d-none d-md-block">
            @guest
            <form class="form-inline my-2 my-lg-0 ml-auto">
                <a href="{{route('login')}}" class="btn btn-login my-2 my-sm-0 mr-2 ml-auto rounded" type="submit">Log
                    In</a>
                <a href="{{route('register')}}" class="btn btn-signup rounded my-2 my-sm-0" type="submit">Sign Up</a>
            </form>
            @endguest
            @auth
            <form action="{{url('logout')}}" class="form-inline my-2 my-lg-0 ml-auto" method="POST">
                @php
                    $auth = Auth::user();
                @endphp
                @if ($auth->role === 'merchant')
                    <a href="{{route('merchant-setting')}}" class="btn btn-login my-2 my-sm-0 mr-2 ml-auto rounded" type="submit">
                        Panel
                    </a>
                @else
                    <a href="{{route('user-comment')}}" class="btn btn-login my-2 my-sm-0 mr-2 ml-auto rounded" type="submit">
                        Setting
                    </a>
                @endif
                @csrf
                <button class="btn btn-signup rounded my-2 my-sm-0" type="submit">Logout</button>
            </form>
            @endauth
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <form class="navbar-form form-inline d-block d-sm-none mt-4" action="/action_page.php">
                <div class="form-group">
                    <input type="text" class="form-control search-form" placeholder="Search Restoran">
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
                <div class="clearfix"></div>
                <hr class="mt-3">
                <div class="row">
                    @guest
                    <button class="btn col-6 btn-login my-2 my-sm-0" type="submit">Log In</button>
                    <button class="btn col-6 btn-signup my-2 my-sm-0" type="submit">Sign Up</button>
                    @endguest
                </div>
            </form>
        </div>
    </div>
</nav>
