{{ Form::open(['route' => 'search.get', 'method' => 'get', 'class' => 'mainbox']) }}
<div class="border-bottom space-xs">
    <h4 class="side-heading">Filters:</h4>
</div>

<div class="filter-item ">
    <div class="filter-heading clearfix"><h4>Keyword</h4></div>
    <div class="form-group">
        <input type="text" class="form-control" name="keyword" />
    </div>
</div>



<div class="filter-item border-bottom">
    <div class="filter-heading clearfix"><h4>Category</h4> {{--<button class="btn">Reset</button>--}}</div>
    <div class="check-group">
        @if( ProductCategory::get()->count() > 0 )
            @foreach( ProductCategory::get() as $category )
                <div class="checkbox">
                    <label> <input type="checkbox" name="category" value="{{ $category->slug }}"> {{ $category->name }} </label>
                </div>
            @endforeach
        @endif
    </div>
</div>

<div class="filter-item border-bottom">
    <div class="filter-heading clearfix"><h4>Ukay Types</h4> {{--<button class="btn">Reset</button>--}}</div>
    <div class="check-group">
        @if( ProductType::get()->count() > 0 )
            @foreach( ProductType::get() as $type )
                <div class="checkbox">
                    <label> <input type="checkbox" name="type" value="{{ $type->slug }}"> {{ $type->name }} </label>
                </div>
            @endforeach
        @endif
    </div>
</div>

<div class="text-center">
    <button type="submit" class="btn btn-default btn-lg">Search</button>
</div>
{{ Form::close() }}