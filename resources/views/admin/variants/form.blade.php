<form action="{{ $url }}" method="POST" class="form">
    {{ csrf_field() }}
    {{ method_field($method) }}
    <input type="hidden" name="product_id" value="{{ $variant->product_id }}" />
    <div class="form-group">
        <label for="price" class="control-label">Price</label>
        <input type="number" name="price" id="price" class="form-control"
               value="{{ old('price', $variant->price) }}">
    </div>
    <div class="form-group pull-right">
        <button type="submit" class="btn btn-primary btn-save">Save</button>
    </div>
</form>
