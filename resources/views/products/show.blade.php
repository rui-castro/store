@extends('layouts.app')

@include('common.errors')

@section('content')
    <div class="container">
        <div class="product row">
            <div class="col-xs-12 col-md-8">
                <img class="img-responsive image" src="{{ $product->imageURL }}"/>
            </div>
            <div class="col-xs-12 col-md-4">
                <h1 class="name">{{ $product->name }}</h1>
                <h2 class="reference">{{ $product->reference }}</h2>
                <h3 class="price"><span class="value">{{ $variant->price + 0 }}</span> €</h3>
                @if ($product->description)
                    <div class="description">{{ $product->description }}</div>
                @endif
                <form action="{{ route('bag_items.store') }}" method="POST">
                    {{ csrf_field() }}
                    <input name="return_url" type="hidden" value="{{ route('products.show', ['id' => $product->id]) }}" />
                    <div class="form-group">
                        <label for="select-variant">Variant</label>
                        <select name="variant_id" id="select-variant" class="form-control">
                            @foreach($product->variants as $product_variant)
                                <option value="{{ $product_variant->id }}"
                                        data-price="{{ $product_variant->price + 0 }}
                                        {{ ($product_variant->id == $variant->id) ? 'selected' : '' }}">{{ $product_variant->valuesAsString() }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input name="quantity" type="number" step="1" value="1" id="quantity" class="form-control"/>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Add to bag</button>
                </form>
            </div>
        </div>
    </div>
@endsection
