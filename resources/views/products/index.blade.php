@extends('layouts.app')
@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- Products -->
        @if (count($products) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Products
                </div>

                <div class="panel-body">
                    @foreach ($products as $product)
                        <div class="product">
                            <div class="name">{{ $product->name }}</div>
                            @if ($product->minimumPrice() == $product->maximumPrice())
                                <div class="price">{{ $product->minimumPrice() }} €</div>
                            @else
                                <div class="price-interval">{{ $product->minimumPrice() }}-{{ $product->maximumPrice() }} €</div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
    @endif
@endsection