@foreach ($filters as $filter)
    @isset($filter->id)
    <option value="{{$filter->id or ""}}">
        {{$filter->name or ""}}
    </option>
    @endisset
@endforeach