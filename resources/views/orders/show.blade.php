@extends('layouts.app')

@include('common.errors')

@section('content')
    <div class="container">
        <h1>Order #{{ $order->id }}</h1>
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $order->name }}</dd>
            <dt>Email</dt>
            <dd>{{ $order->email }}</dd>
            @if ($order->notes)
                <dt>Notes</dt>
                <dd>{{ $order->notes }}</dd>
            @endif
        </dl>
    </div>
@endsection
