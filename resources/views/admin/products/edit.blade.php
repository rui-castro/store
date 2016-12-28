@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <h1>Edit "{{ $product->name }}"</h1>
        <div class="product-variants">
        @include('common.errors')
        <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#product" aria-controls="product" role="tab"
                                                          data-toggle="tab">Product</a></li>
                <li role="presentation"><a href="#variants" aria-controls="variants" role="tab"
                                           data-toggle="tab">Variants</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="product">
                    @include('admin.products.form', [
                        'url' => route('admin.products.update', ['id' => $product->id], false),
                        'method' => 'PUT'
                    ])
                </div>
                <div role="tabpanel" class="tab-pane" id="variants">
                    @include('admin.variants._index', [
                        'product' => $product,
                        'variants' => $product->variants,
                    ])
                </div>
            </div>
        </div><!-- .product-variants -->
    </div><!-- .container -->
@endsection
