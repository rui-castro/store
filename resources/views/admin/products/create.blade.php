@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <h1>New product</h1>
        @include('common.errors')
        @include('admin.products.form', [
            'url' => route('admin.products.store', [], false),
            'method' => 'POST'
        ])
    </div><!-- container -->
@endsection
