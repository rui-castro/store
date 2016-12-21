@extends('layouts.app')
@section('content')

    <!-- Bootstrap Boilerplate... -->
    <div class="container">

        <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- Products -->
        @if (count($products) > 0)
            <div class="row">
                @foreach ($products as $product)
                    <div class="product col-xs-12 col-sm-6 col-md-4">
                        <img src="{{ $product->imageURL() }}" class="img-responsive"/>
                        <div class="name">{{ $product->name }}</div>
                        @if ($product->minimumPrice() == $product->maximumPrice())
                            <div class="price">{{ $product->minimumPrice() }} €</div>
                        @else
                            <div class="price-interval">{{ $product->minimumPrice() }}-{{ $product->maximumPrice() }}€
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection