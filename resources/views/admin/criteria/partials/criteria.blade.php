@foreach ($criteria as $criterion_list)

    <option value="{{$criterion_list->id or ""}}"

            @isset($criterion->id)

            @if ($criterion->parent_id == $criterion_list->id)
            selected=""
            @endif

            @if ($criterion->id == $criterion_list->id)
            hidden=""
            @endif

            @endisset

    >
        {!! $delimiter or "" !!}{{$criterion_list->name or ""}}
    </option>

    @if (count($criterion_list->children) > 0)

        @include('admin.criteria.partials.criteria', [
          'criteria' => $criterion_list->children,
          'delimiter'  => ' - ' . $delimiter
        ])

    @endif
@endforeach