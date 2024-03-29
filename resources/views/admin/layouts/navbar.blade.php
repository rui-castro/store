<!-- Left Side Of Navbar -->
<ul class="nav navbar-nav">
    @if (Auth::check())
        <li @if (starts_with(Route::currentRouteName(), 'admin.orders')) class="active" @endif>
            <a href="{{ route('admin.orders.index', [], false) }}">Orders</a>
        </li>
        <li @if (starts_with(Route::currentRouteName(), 'admin.products')) class="active" @endif>
            <a href="{{ route('admin.products.index', [], false) }}">Products</a>
        </li>
        <li @if (starts_with(Route::currentRouteName(), 'admin.options')) class="active" @endif>
            <a href="{{ route('admin.options.index', [], false) }}">Options</a>
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
        <li><a href="{{ route('root', [], false) }}">Store</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
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
