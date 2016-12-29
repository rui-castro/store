@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <h1>Edit "{{ $option->name }}"</h1>
        @include('common.errors')
        <div class="product-variants">
        @include('common.errors')
        <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#option" aria-controls="product" role="tab" data-toggle="tab">Option</a>
                </li>
                <li role="presentation">
                    <a href="#values" aria-controls="values" role="tab" data-toggle="tab">Values</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="option">
                    @include('admin.options.form', [
                        'url' => route('admin.options.update', ['id' => $option->id], false),
                        'method' => 'PUT',
                        'cancel_url' => route('admin.options.index'),
                    ])
                </div>
                <div role="tabpanel" class="tab-pane" id="values">
                    @include('admin.option_values._index', [
                        'option' => $option,
                    ])
                </div>
            </div>
        </div><!-- .product-variants -->
    </div><!-- .container -->
@endsection
