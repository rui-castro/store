<form action="{{ $url }}" method="POST" class="form">
    {{ csrf_field() }}
    {{ method_field($method) }}
    <input type="hidden" name="option_id" value="{{ $option_value->option->id }}"/>
    <div class="form-group">
        <label for="value" class="control-label">Value</label>
        <input type="text" name="value" id="value" class="form-control"
               value="{{ old('value', $option_value->value) }}">
    </div>
    <div class="form-group pull-right">
        <a class="btn btn-info btn-cancel" href="{{ $cancel_url }}">Cancel</a>
        <button type="submit" class="btn btn-primary btn-save">Save</button>
    </div>
</form>
