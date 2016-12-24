@extends('layouts.app')

@include('common.errors')

@section('content')
    <div class="container">
        <div class="bag">
            @if ($bag->isEmpty())
                <h1>Your bag is empty!</h1>
                <a href="{{ route('products.index') }}">Continue shopping</a>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th class="image"></th>
                        <th class="name">Name</th>
                        <th class="reference">Reference</th>
                        <th class="options">Options</th>
                        <th class="quantity">Quantity</th>
                        <th class="price">Price</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bag->items as $bag_item)
                        <tr class="bag_item">
                            <td class="image"><a
                                        href="{{ route('products.show', ['id' => $bag_item->product->id]) }}"><img
                                            class="img-responsive" src="{{ $bag_item->imageURL }}"/></a></td>
                            <td class="name"><a
                                        href="{{ route('products.show', ['id' => $bag_item->product->id]) }}">{{ $bag_item->name }}</a>
                            </td>
                            <td class="reference">{{ $bag_item->reference }}</td>
                            <td class="options">
                                <dl class="dl-horizontal">
                                    @foreach($bag_item->values as $value)
                                        <dt>{{ $value->name }}</dt>
                                        <dd>{{ $value->value }}</dd>
                                    @endforeach
                                </dl>
                            </td>
                            <td class="quantity">{{ $bag_item->quantity }}</td>
                            <td class="price">{{ $bag_item->price + 0 }} €</td>
                            <td>
                                <form action="{{ route('bag_items.destroy', ['id' => $bag_item->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="return_url" value="{{ route('bags.show') }}"/>
                                    <button class="btn"><span class="glyphicon glyphicon-remove"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5" class="total">Total</td>
                        <td class="price">{{ $bag->price }} €</td>
                        <td></td>
                    </tr>
                    </tfoot>
                </table>
                <a class="btn btn-lg btn-primary pull-right" href="{{ route('orders.create', [], false) }}">Checkout</a>
            @endif
        </div>
    </div>
@endsection
