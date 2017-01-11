<nav class="navbar navbar-default navbar-fixed-top navbar-main">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ route('root') }}">
                <img alt="Galeiras" src="{{ asset('images/logo-211x51.png') }}"/>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @if (Auth::check())
                    <li @if (starts_with(Route::currentRouteName(), 'products')) class="active" @endif>
                        <a href="{{ route('products.index', [], false) }}">Products</a>
                    </li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login', [], false) }}">Login</a></li>
                    @if(false)
                        <li><a href="{{ route('register', [], false) }}">Register</a></li>
                    @endif
                @else
                    <li>
                        <a href="{{ route('bags.show') }}" class="bag">
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                            <span class="badge">{{ $bag->totalCount }}</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @if(Auth::user()->admin)
                                <li><a href="{{ route('admin', [], false) }}">Backoffice</a></li>
                            @endif
                            <li>
                                <a href="{{ route('logout', [], false) }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout', [], false) }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
