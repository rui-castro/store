@extends('layouts.app')
@section('content')
    <div class="container layout-sidebar layout-sidebar-left">
        <a data-toggle="collapse" data-target="#sidebar" class="visible-xs">
            <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Filters
        </a>
        <div class="row">
            <div id="sidebar"
                 class="col-xs-6 col-sm-3 visible-sm visible-md visible-lg collapse sliding-sidebar">
                @yield('sidebar')
            </div>

            <!-- table container -->
            <div class="content col-sm-9">
                @yield('maincontent')
            </div>

        </div>
    </div>
@endsection
