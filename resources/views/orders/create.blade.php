@extends('layouts.app')
@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="container">

        <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- Product -->
        <h1>New order</h1>
        <form action="{{ route('orders.store') }}" method="POST" class="form">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name" class="control-label">Name</label>
                <input type="text" name="name" id="name" class="form-control"
                       value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="email" class="control-label">Email</label>
                <input type="email" name="email" id="email" class="form-control"
                       value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="notes" class="control-label">Notes</label>
                <textarea name="notes" id="notes" class="form-control"
                          rows="3">{{ old('notes') }}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary pull-right">
                    <i class="fa fa-btn fa-plus"></i> Confirm
                </button>
            </div>
        </form>
    </div><!-- container -->
@endsection