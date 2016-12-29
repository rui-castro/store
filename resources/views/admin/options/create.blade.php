@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <h1>New option</h1>
        @include('common.errors')
        @include('admin.options.form', [
            'url' => route('admin.options.store', [], false),
            'method' => 'POST',
            'cancel_url' => route('admin.options.index'),
        ])
    </div><!-- container -->
@endsection
