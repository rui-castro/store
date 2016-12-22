@extends('layouts.app')
@section('content')
    <div class="layout-sidebar layout-sidebar-left">
        <div class="navbar navbar-default navbar-sidebar visible-xs">
            <div class="container-fluid">
                <a data-toggle="collapse" data-target="#sidebar">
                    <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
                </a>
            </div>
        </div>
        <div class="container-fluid">
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
    </div>
@endsection
