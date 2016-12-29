@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <h1>Edit value of option "{{ $option_value->option->name }}"</h1>
        @include('admin.option_values.form', [
            'url' => route('admin.options.option_values.update', ['option_id' => $option_value->option->id, 'option_value_id' => $option_value->id], false),
            'method' => 'PUT',
            'cancel_url' => route('admin.options.edit', ['id' => $option_value->option->id]) . '#values',
        ])
    </div><!-- .container -->
@endsection
