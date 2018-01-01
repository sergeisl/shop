@foreach ($criteria as $criterion)

    <option value="{{$criterion->id or ""}}"

            @isset($product->id)
            @foreach ($product->criteria as $criterion_article)
            @if ($criterion->id == $criterion_article->id)
            selected="selected"
            @endif
            @endforeach
            @endisset

    >
        {!! $delimiter or "" !!}{{$criterion->name or ""}}
    </option>

    @if (count($criterion->children) > 0)

        @include('admin.products.partials.criteria', [
          'criteria' => $criterion->children,
          'delimiter'  => ' - ' . $delimiter
        ])

    @endif
@endforeach