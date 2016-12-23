@extends('layouts.app')

@include('common.errors')

@section('content')
    <div class="container">
        <div class="product row">
            <div class="col-xs-12 col-md-8">
                <img class="img-responsive image" src="{{ $product->imageURL() }}"/>
                @if ($product->description)
                    <div class="description">{{ $product->description }}</div>
                @endif
            </div>
            <div class="col-xs-12 col-md-4">
                <h1 class="name">{{ $product->name }}</h1>
                <h2 class="reference">{{ $product->reference }}</h2>
            <!--<h3 class="price">{{ $product->price }} €</h3>-->
                <form>
                    <div class="form-group">
                        <label for="select-color">Color</label>
                        <select name="color" id="select-color" class="form-control">
                            <option value="1">Yellow</option>
                            <option value="2">White</option>
                            <option value="3">Pink</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="select-karat">Karat</label>
                        <select name="karat" id="select-karat" class="form-control">
                            <option value="4">8</option>
                            <option value="5" selected>9</option>
                            <option value="6">14</option>
                            <option value="7">18</option>
                            <option value="8">19.2</option>
                        </select>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Add to bag</button>
                </form>
            </div>
        </div>
    </div>
@endsection
