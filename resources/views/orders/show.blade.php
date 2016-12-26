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
        <table class="table">
            <thead>
            <tr>
                <th class="image"></th>
                <th class="name">Name</th>
                <th class="reference">Reference</th>
                <th class="options">Options</th>
                <th class="quantity">Quantity</th>
                <th class="price">Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->items as $item)
                <tr class="order_item">
                    <td class="image"><img class="img-responsive" src="{{ $item->imageURL }}"/></td>
                    <td class="name">{{ $item->name }}</td>
                    <td class="reference">{{ $item->reference }}</td>
                    <td class="options">
                    </td>
                    <td class="quantity">{{ $item->quantity }}</td>
                    <td class="price">{{ $item->price + 0 }} €</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" class="total">Total</td>
                <td class="price">{{ $order->price }} €</td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection