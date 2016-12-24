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
                    <input name="return_url" type="hidden"
                           value="{{ route('products.show', ['id' => $product->id]) }}"/>
                    @if ($product->variants->count()==1)
                        <input name="variant_id" type="hidden" value="{{ $variant->id }}"/>
                    @else
                        <div class="form-group">
                            <label for="select-variant">Variant</label>
                            <select name="variant_id" id="select-variant" class="form-control">
                                @foreach($product->variants as $var)
                                    <option value="{{ $var->id }}"
                                            data-price="{{ $var->price + 0 }}"
                                            {{ ($var->id == $variant->id) ? 'selected' : '' }}
                                    >{{ $var->valuesAsString() }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
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
