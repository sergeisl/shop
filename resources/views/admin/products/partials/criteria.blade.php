@foreach ($filters as $filter)
    <option disabled="true">
      {{$filter->name or ""}}
    </option>

    @foreach ($filter->criteria as $criterion)
        <option value="{{$criterion->id or ""}}"
                @isset($product->id)
                @foreach ($product->criteria as $criterion_article)
                @if ($criterion->id == $criterion_article->id)
                selected="selected"
                @endif
                @endforeach
                @endisset
        >
           {!! "&nbsp;&nbsp;&nbsp;&nbsp;" !!}{{$criterion->name or ""}}
        </option>
    @endforeach
@endforeach