@extends('admin.layouts.app')
@section('content')
    <div class="container">
        @include('common.errors')

        <h1>Edit "{{ $product->name }}"</h1>
        <form action="{{ route('admin.products.update', ['id' => $product->id], false) }}" method="POST" class="form"
              enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            @include('admin.products.form_fields')
        </form>
    </div><!-- container -->
@endsection
