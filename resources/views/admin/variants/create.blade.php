@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <h1>New variant of product "{{ $product->name }}"</h1>
        @include('common.errors')
        @include('admin.variants.form', [
            'url' => route('admin.variants.store', [], false),
            'method' => 'POST',
            'cancel_url' => route('admin.products.edit', ['id' => $product->id]) . '#variants',
        ])
    </div><!-- container -->
@endsection
