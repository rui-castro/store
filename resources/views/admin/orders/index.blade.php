@extends('admin.layouts.app')
@section('content')
    <div class="container">
        @include('common.errors')
        @if (count($orders) == 0)
            <h4>No orders yet!</h4>
        @else
            <h4>{{ count($orders) }} orders</h4>
            <table class="table table-striped table-hover orders">
                <thead>
                <tr>
                    <th class="id">#</th>
                    <th class="name">Name</th>
                    <th class="email">Email</th>
                    <th class="price">Price</th>
                    <th class="date">Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr class="order">
                        <td class="id">
                            <a href="{{ route('admin.orders.show', ['id' => $order->id]) }}">{{ $order->id }}</a>
                        </td>
                        <td class="name">
                            <a href="{{ route('admin.orders.show', ['id' => $order->id]) }}">{{ $order->name }}</a>
                        </td>
                        <td class="email">
                            <a href="{{ route('admin.orders.show', ['id' => $order->id]) }}">{{ $order->email }}</a>
                        </td>
                        <td class="price">
                            <a href="{{ route('admin.orders.show', ['id' => $order->id]) }}">{{ $order->price }} €</a>
                        </td>
                        <td class="date">
                            <a href="{{ route('admin.orders.show', ['id' => $order->id]) }}">{{ $order->created_at }}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection