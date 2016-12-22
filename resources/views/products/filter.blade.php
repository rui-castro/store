<div class="filter">
    <div class="filter-group">
        <h4 data-toggle="collapse" data-target="#group-collection">
            <span class="glyphicon glyphicon-triangle-bottom parent-expanded"></span>
            <span class="glyphicon glyphicon-triangle-right parent-collapsed"></span>
            Collections
        </h4>
        <div id="group-collection" class="list-group collapse in">
            @foreach (["SWEETNESS", "ORGANIC", "OPTIMISTIC"] as $item)
                <a class="list-group-item" href="#">
                    {{ $item }} <span class="badge">3</span>
                </a>
            @endforeach
        </div>
    </div>
    <div class="filter-group">
        <h4 data-toggle="collapse" data-target="#group-type">
            <span class="glyphicon glyphicon-triangle-bottom parent-expanded"></span>
            <span class="glyphicon glyphicon-triangle-right parent-collapsed"></span>
            Typology
        </h4>
        <div id="group-type" class="list-group collapse in">
            @foreach (["Brincos", "Aneis", "Colares", "Pulseiras"] as $item)
                <a class="list-group-item" href="#">
                    {{ $item }} <span class="badge">3</span>
                </a>
            @endforeach
        </div>
    </div>
    <div class="filter-group">
        <h4 data-toggle="collapse" data-target="#group-color">
            <span class="glyphicon glyphicon-triangle-bottom parent-expanded"></span>
            <span class="glyphicon glyphicon-triangle-right parent-collapsed"></span>
            Colors
        </h4>
        <div id="group-color" class="list-group collapse in">
            @foreach (["Yellow", "White", "Pink"] as $item)
                <a class="list-group-item" href="#">
                    {{ $item }} <span class="badge">3</span>
                </a>
            @endforeach
        </div>
    </div>
    <div class="filter-group">
        <h4 data-toggle="collapse" data-target="#group-karat">
            <span class="glyphicon glyphicon-triangle-bottom parent-expanded"></span>
            <span class="glyphicon glyphicon-triangle-right parent-collapsed"></span>
            Karats
        </h4>
        <div id="group-karat" class="list-group collapse in">
            @foreach (["8", "9", "14", "18", "19.2"] as $item)
                <a class="list-group-item" href="#">
                    {{ $item }} <span class="badge">3</span>
                </a>
            @endforeach
        </div>
    </div>
</div>