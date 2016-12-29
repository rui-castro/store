<form action="{{ $url }}" method="POST" class="form">
    {{ csrf_field() }}
    {{ method_field($method) }}
    <input type="hidden" name="product_id" value="{{ $variant->product->id }}"/>
    <div class="form-group">
        <label for="price" class="control-label">Price</label>
        <input type="number" name="price" id="price" class="form-control"
               value="{{ old('price', $variant->price) }}">
    </div>
    <div class="form-group">
        @foreach($variant->values as $index => $value)
            <input type="hidden" name="values[{{ $index }}][id]" value="{{ $value->id }}"/>
            <label for="value" class="form-label">{{ $value->name }}</label>
            <select id="value" name="values[{{ $index }}][option_value_id]" class="form-control">
                @foreach($value->option->values as $option_value)
                    <option value="{{ $option_value->id }}"
                            {{ $value->optionValue->id == $option_value->id ? 'selected' : '' }}
                    >{{ $option_value->value }}</option>
                @endforeach
            </select>
        @endforeach
    </div>
    <div class="form-group pull-right">
        <a class="btn btn-info btn-cancel" href="{{ $cancel_url }}">Cancel</a>
        <button type="submit" class="btn btn-primary btn-save">Save</button>
    </div>
</form>
