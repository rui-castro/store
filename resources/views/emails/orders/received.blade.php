@extends('emails.app')
@section('head')
    <style>
        .container {
            margin: auto;
            max-width: 600px;
        }
        .container .logo {
            text-align: center;
        }
        .container .order_item .image img {
            max-width: 100px;
        }
        table th,
        table td {
            padding: 8px;
            line-height: 1.6;
            text-align: left;
        }
        table tbody td,
        table tfoot td {
            border-top: 1px solid #ddd;
        }
        table tfoot {
            font-weight: bold;
        }
        table tfoot .total {
            text-align: right;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="logo"><img src="{{ $message->embed(public_path('images/logo-211x51.png')) }}"></div>
        <p>Dear {{ $order->name }},<br/>
            <br/>
            Thank you for placing your order.<br/>
            <br/>
            Best regards,<br/>
            Galeiras
        </p>
        <hr/>
        <h2>Order #{{ $order->id }}</h2>
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
                <th class="notes">Notes</th>
                <th class="price">Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->items as $item)
                <tr class="order_item">
                    <td class="image"><img class="img-responsive" src="{{ $item->imageURL ? url($item->imageURL) : null }}"/></td>
                    <td class="name">{{ $item->name }}</td>
                    <td class="reference">{{ $item->reference }}</td>
                    <td class="options">
                        @foreach($item->values as $value)
                            <div><span class="name">{{ $value->name }}: </span><span
                                        class="value">{{ $value->value }}</span></div>
                        @endforeach
                    </td>
                    <td class="quantity">{{ $item->quantity }}</td>
                    <td class="notes">{{ $item->notes }}</td>
                    <td class="price">{{ $item->price + 0 }}€</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="6" class="total">Total</td>
                <td class="price">{{ $order->price }}€</td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
