@extends('layouts.app')

@include('common.errors')

@section('content')
    <div class="container">
        <h1>Order confirmation</h1>
        @include('orders.order')
    </div>
@endsection
