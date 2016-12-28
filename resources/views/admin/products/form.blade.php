<form action="{{ $url }}" method="POST" class="form" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field($method) }}
    <div class="form-group">
        <label for="product-reference" class="control-label">Reference</label>
        <input type="text" name="reference" id="product-reference" class="form-control"
               value="{{ old('reference', $product->reference) }}">
    </div>
    <div class="form-group">
        <label for="product-name" class="control-label">Name</label>
        <input type="text" name="name" id="product-name" class="form-control"
               value="{{ old('name', $product->name) }}">
    </div>
    <div class="form-group">
        <label for="product-description" class="control-label">Description</label>
        <textarea name="description" id="product-description"
                  class="form-control" rows="3">{{ old('description', $product->description) }}</textarea>
    </div>
    <div class="form-group">
        <label for="product-type" class="control-label">Type</label>
        <input type="text" name="type" id="product-type" class="form-control"
               value="{{ old('type', $product->type) }}">
    </div>
    <div class="form-group">
        <label for="product-collection" class="control-label">Collection</label>
        <input type="text" name="collection" id="product-collection" class="form-control"
               value="{{ old('collection', $product->collection) }}">
    </div>
    <div class="form-group">
        <label for="product-notes" class="control-label">Notes</label>
        <textarea name="notes" id="product-notes" class="form-control"
                  rows="3">{{ old('notes', $product->notes) }}</textarea>
    </div>
    <div class="form-group form-group-image">
        <label for="product-image" class="control-label">Image</label>
        @if ($product->image_file_name)
            <div class="preview">
                <img class="img-responsive" src="{{ $product->imageURL }}"/>
                {{ $product->image_file_name }} ({{ $product->image_file_size  }} bytes)
            </div>
        @endif
        <input type="file" name="image" id="product-image" class="form-control"
               value="{{ old('image') }}">
    </div>
    <div class="form-group pull-right">
        <a class="btn btn-info btn-cancel" href="{{ route('admin.products.index') }}">Cancel</a>
        <button type="submit" class="btn btn-primary btn-save">Save</button>
    </div>
</form>
