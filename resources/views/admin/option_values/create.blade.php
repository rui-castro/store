@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <h1>New value of option "{{ $option_value->option->name }}"</h1>
        @include('common.errors')
        @include('admin.option_values.form', [
            'url' => route('admin.options.option_values.store', ['option_id' => $option_value->option->id], false),
            'method' => 'POST',
            'cancel_url' => route('admin.options.edit', ['id' => $option_value->option->id]) . '#values',
        ])
    </div><!-- container -->
@endsection
