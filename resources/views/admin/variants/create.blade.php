@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <h1>New variant of product "{{ $variant->product->name }}"</h1>
        @include('common.errors')
        @include('admin.variants.form', [
            'url' => route('admin.products.variants.store', [], false),
            'method' => 'POST'
        ])
    </div><!-- container -->
@endsection
