@extends('admin.layouts.app')

@include('common.errors')

@section('content')
    <div class="container">
        @if (count($products) == 0)
            <h4>No products!</h4>
        @else
            <h4>{{ count($products) }} products</h4>
            <a class="btn pull-right" href="{{ route('admin.products.create') }}">New product</a>
            <table class="table products">
                <thead>
                <tr>
                    <th class="image">Image</th>
                    <th class="name">Name</th>
                    <th class="reference">Reference</th>
                    <th class="type">Type</th>
                    <th class="collection">Collection</th>
                    <th class="actions"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr class="product">
                        <td class="image"><img src="{{ $product->imageURL() }}" class="img-responsive"/></td>
                        <td class="name">{{ $product->name }}</td>
                        <td class="reference">{{ $product->reference }}</td>
                        <td class="type">{{ $product->type }}</td>
                        <td class="collection">{{ $product->collection }}</td>
                        <td class="actions">
                            <a class="btn btn-warning"
                               href="{{ route('admin.products.edit', ['id' => $product->id]) }}"><span
                                        class="glyphicon glyphicon-edit"></span></a>
                            <form class="form-inline form-delete-product"
                                  action="{{ route('admin.products.destroy', ['id' => $product->id]) }}" method="POST"
                                  data-confirm-message="Delete product '{{ $product->name }}'?">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="return_url" value="{{ route('admin.products.index') }}"/>
                                <button class="btn"><span class="glyphicon glyphicon-remove"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a class="btn pull-right" href="{{ route('admin.products.create') }}">New product</a>
        @endif
    </div>
@endsection