@extends('admin.layouts.app')
@section('content')
    <div class="container">
        @include('common.errors')
        @if (count($options) == 0)
            <h4>No options!</h4>
        @else
            <h4>{{ count($options) }} options</h4>
            <a class="btn pull-right" href="{{ route('admin.options.create') }}">New option</a>
            <table class="table table-striped table-hover options">
                <thead>
                <tr>
                    <th class="name">Name</th>
                    <th class="actions"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($options as $option)
                    <tr class="option">
                        <td class="name">{{ $option->name }}</td>
                        <td class="actions">
                            <a class="btn btn-warning"
                               href="{{ route('admin.options.edit', ['id' => $option->id]) }}"><span
                                        class="glyphicon glyphicon-edit"></span></a>
                            <form class="form-inline form-delete-option"
                                  action="{{ route('admin.options.destroy', ['id' => $option->id]) }}" method="POST"
                                  data-confirm-message="Delete option '{{ $option->name }}'?">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="return_url" value="{{ route('admin.options.index') }}"/>
                                <button class="btn"><span class="glyphicon glyphicon-remove"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a class="btn pull-right" href="{{ route('admin.options.create') }}">New option</a>
        @endif
    </div>
@endsection