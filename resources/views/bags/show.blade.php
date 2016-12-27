@extends('layouts.app')

@include('common.errors')

@section('content')
    <div class="container">
        @if ($bag->isEmpty())
            <h1>Your bag is empty!</h1>
            <a href="{{ route('products.index') }}">Continue shopping</a>
        @else
            <h1>Your bag</h1>
            @include('bags.bag')
            <a class="btn btn-lg btn-primary pull-right" href="{{ route('orders.create', [], false) }}">Checkout</a>
        @endif
    </div>
@endsection
