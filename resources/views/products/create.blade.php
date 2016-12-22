@extends('layouts.app')
@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="container">

        <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- Product -->
        <h1>New product</h1>
        <form action="{{ url('products') }}" method="POST" class="form" enctype="multipart/form-data">
        {{ csrf_field() }}

        <!-- Product Reference -->
            <div class="form-group">
                <label for="product-reference" class="control-label">Reference</label>
                <input type="text" name="reference" id="product-reference" class="form-control"
                       value="{{ old('reference') }}">
            </div>

            <!-- Product Name -->
            <div class="form-group">
                <label for="product-name" class="control-label">Name</label>
                <input type="text" name="name" id="product-name" class="form-control"
                       value="{{ old('name') }}">
            </div>

            <!-- Product Description -->
            <div class="form-group">
                <label for="product-description" class="control-label">Description</label>
                <textarea name="description" id="product-description"
                          class="form-control" rows="3">{{ old('description') }}</textarea>
            </div>

            <!-- Product Type -->
            <div class="form-group">
                <label for="product-type" class="control-label">Type</label>
                <input type="text" name="type" id="product-type" class="form-control"
                       value="{{ old('type') }}">
            </div>

            <!-- Product Collection -->
            <div class="form-group">
                <label for="product-collection" class="control-label">Collection</label>
                <input type="text" name="collection" id="product-collection" class="form-control"
                       value="{{ old('collection') }}">
            </div>

            <!-- Product Notes -->
            <div class="form-group">
                <label for="product-notes" class="control-label">Notes</label>
                <textarea name="notes" id="product-notes" class="form-control"
                          rows="3">{{ old('notes') }}</textarea>
            </div>

            <!-- Product Image -->
            <div class="form-group">
                <label for="product-image" class="control-label">Image</label>
                <input type="file" name="image" id="product-image" class="form-control"
                       value="{{ old('image') }}">
            </div>

            <!-- Add Product Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-plus"></i> Add Product
                </button>
            </div>
        </form>
    </div><!-- container -->
@endsection