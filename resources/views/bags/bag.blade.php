<table class="table table-bag">
    <thead>
    <tr>
        <th class="image"></th>
        <th class="name">Name</th>
        <th class="reference">Reference</th>
        <th class="options">Options</th>
        <th class="quantity">Quantity</th>
        <th class="notes">Notes</th>
        <th class="price">Price</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($bag->items as $item)
        <tr class="bag_item">
            <td class="image"><a
                        href="{{ route('products.show', ['id' => $item->product->id]) }}"><img
                            class="img-responsive" src="{{ $item->imageURL }}"/></a></td>
            <td class="name"><a
                        href="{{ route('products.show', ['id' => $item->product->id]) }}">{{ $item->name }}</a>
            </td>
            <td class="reference">{{ $item->reference }}</td>
            <td class="options">
                @foreach($item->values as $value)
                    <div><span class="name">{{ $value->name }}: </span><span
                                class="value">{{ $value->value }}</span></div>
                @endforeach
            </td>
            <td class="quantity">{{ $item->quantity }}</td>
            <td class="notes">{{ $item->notes }}</td>
            <td class="price">{{ $item->price + 0 }}€</td>
            <td>
                <form action="{{ route('bag_items.destroy', ['id' => $item->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="return_url" value="{{ route('bags.show') }}"/>
                    <button class="btn"><span class="glyphicon glyphicon-remove"></span></button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="6" class="total">Total</td>
        <td class="price">{{ $bag->price }}€</td>
        <td></td>
    </tr>
    </tfoot>
</table>
