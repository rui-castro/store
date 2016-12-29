@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <h1>Edit variant of product "{{ $variant->product->name }}"</h1>
        @include('admin.variants.form', [
            'url' => route('admin.variants.update', ['id' => $variant->id], false),
            'method' => 'PUT',
            'cancel_url' => route('admin.products.edit', ['id' => $variant->product->id]) . '#variants',
        ])
    </div><!-- .container -->
@endsection
