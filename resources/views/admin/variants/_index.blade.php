<div class="variants">
    @if (count($product->variants) == 0)
        <h4>No variants!</h4>
    @else
        <h4>{{ count($product->variants) }} variants</h4>
        <a class="btn pull-right" href="{{ route('admin.variants.create', ['product_id' => $product->id]) }}">New
            variant</a>
        <table class="table variants">
            <thead>
            <tr>
                <th class="price">Price</th>
                @foreach($product->options as $option)
                    <th class="option {{ $option->name }}">{{ $option->name }}</th>
                @endforeach
                <th class="actions"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($product->variants as $variant)
                <tr class="variant">
                    <td class="price">{{ $variant->price }}</td>
                    @foreach($product->options as $option)
                        <td class="option {{ $option->name }}">{{ $variant->value($option)->value }}</td>
                    @endforeach
                    <td class="actions">
                        <a class="btn btn-warning"
                           href="{{ route('admin.variants.edit', ['id' => $variant->id]) }}"><span
                                    class="glyphicon glyphicon-edit"></span></a>
                        <form class="form-inline form-delete-variant"
                              action="{{ route('admin.variants.destroy', ['id' => $variant->id]) }}"
                              method="POST"
                              data-confirm-message="Delete variant '{{ $variant->id }}'?">
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
           href="{{ route('admin.variants.create', ['product_id' => $product->id]) }}">New variant</a>
    @endif
</div>