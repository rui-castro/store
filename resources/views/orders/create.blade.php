@extends('layouts.app')
@section('content')

    <div class="container">

        @include('common.errors')

        <h1>Complete your order</h1>
        @include('bags.bag')
        <form action="{{ route('orders.store') }}" method="POST" class="form">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name" class="control-label">Name</label>
                <input type="text" name="name" id="name" class="form-control"
                       value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="email" class="control-label">Email</label>
                <!-- type should be "email". It's not to allow multiple addresses. -->
                <input type="text" name="email" id="email" class="form-control"
                       value="{{ old('email') }}" placeholder="client@example.com, alternative@example.com">
            </div>

            <div class="form-group">
                <label for="notes" class="control-label">Notes</label>
                <textarea name="notes" id="notes" class="form-control"
                          rows="3">{{ old('notes') }}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-primary pull-right">
                    <i class="fa fa-btn fa-plus"></i> Confirm order
                </button>
            </div>
        </form>
    </div><!-- container -->
@endsection