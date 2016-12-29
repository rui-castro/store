<form action="{{ $url }}" method="POST" class="form">
    {{ csrf_field() }}
    {{ method_field($method) }}
    <div class="form-group">
        <label for="name" class="control-label">Name</label>
        <input type="text" name="name" id="name" class="form-control"
               value="{{ old('name', $option->name) }}">
    </div>
    <div class="form-group pull-right">
        <a class="btn btn-info btn-cancel" href="{{ $cancel_url }}">Cancel</a>
        <button type="submit" class="btn btn-primary btn-save">Save</button>
    </div>
</form>
