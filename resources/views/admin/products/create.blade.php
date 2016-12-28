@extends('admin.layouts.app')
@section('content')
    <div class="container">
        @include('common.errors')

        <h1>New product</h1>
        <form action="{{ route('admin.products.store', [], false) }}" method="POST" class="form"
              enctype="multipart/form-data">
            @include('admin.products.form_fields')
        </form>
    </div><!-- container -->
@endsection
