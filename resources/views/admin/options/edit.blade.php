@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <h1>Edit "{{ $option->name }}"</h1>
        @include('common.errors')
        @include('admin.options.form', [
            'url' => route('admin.options.update', ['id' => $option->id], false),
            'method' => 'PUT',
            'cancel_url' => route('admin.options.index'),
        ])
    </div><!-- .container -->
@endsection
