<div class="option_values">
    <!--<a class="btn pull-right"
       href="{{ route('admin.options.option_values.create', ['option_id' => $option->id]) }}">New value</a>-->
    @if (count($option->values) == 0)
        <h4>No values!</h4>
    @else
        <h4>{{ count($option->values) }} values</h4>
        <table class="table table-striped table-hover option_values">
            <thead>
            <tr>
                <th class="value">Value</th>
                <th class="actions"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($option->values as $value)
                <tr class="variant">
                    <td class="value">
                        <a href="{{ route('admin.options.option_values.edit', ['option_id' => $option->id, 'option_value_id' => $value->id]) }}">{{ $value->value }}</a>
                    </td>
                    <td class="actions">
                        <a class="btn btn-warning"
                           href="{{ route('admin.options.option_values.edit', ['option_id' => $option->id, 'option_value_id' => $value->id]) }}"><span
                                    class="glyphicon glyphicon-edit"></span></a>
                        <form class="form-inline form-delete-variant"
                              action="{{ route('admin.options.option_values.destroy', ['option_id' => $option->id, 'option_value_id' => $value->id]) }}"
                              method="POST"
                              data-confirm-message="Delete option value '{{ $value->value }}'?">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="return_url" value="{{ Request::fullUrl() }}"/>
                            <button class="btn"><span class="glyphicon glyphicon-remove"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn pull-right"
           href="{{ route('admin.options.option_values.create', ['option_id' => $option->id]) }}">New value</a>
    @endif
</div>