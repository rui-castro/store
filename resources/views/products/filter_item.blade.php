@if (count($filter->items) > 0)
    <div class="filter-group">
        <h4 data-toggle="collapse" data-target="#group-{{ $filter->name }}">
            <span class="glyphicon glyphicon-triangle-bottom parent-expanded"></span>
            <span class="glyphicon glyphicon-triangle-right parent-collapsed"></span>
            {{ $filter->name }}
        </h4>
        <div id="group-{{ $filter->name }}" class="list-group collapse in">
            @foreach ($filter->items as $item)
                <a class="list-group-item" href="{{ $item->url }}">
                    {{ $item->name }} <span class="badge">{{ $item->count }}</span>
                </a>
            @endforeach
        </div>
    </div>
@endif
