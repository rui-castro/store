@extends('admin.layouts.app')
@include('common.errors')
@section('content')
    <div class="container">
        <h1>Order #{{ $order->id }}</h1>
        @include('orders.order')
    </div>
@endsection
