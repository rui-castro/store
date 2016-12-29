<ul class="nav navbar-nav">
    @if (Auth::check())
    @endif
    <li @if (starts_with(Route::currentRouteName(), 'admin.orders')) class="active" @endif>
        <a href="{{ route('admin.orders.index', [], false) }}">Orders</a>
    </li>
    <li @if (starts_with(Route::currentRouteName(), 'admin.products')) class="active" @endif>
        <a href="{{ route('admin.products.index', [], false) }}">Products</a>
    </li>
    <li @if (starts_with(Route::currentRouteName(), 'admin.options')) class="active" @endif>
        <a href="{{ route('admin.options.index', [], false) }}">Options</a>
    </li>
</ul>
<ul class="nav navbar-nav navbar-right">
    <li><a href="{{ route('root') }}" target="_blank">Store</a></li>
<!--
    @if (Auth::guest())
    <li><a href="/auth/login">Login</a></li>
@else
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
           aria-expanded="false">{{ Auth::user()->name }}
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="/auth/logout">Logout</a></li>
        </ul>
    </li>
@endif
-->
</ul>
