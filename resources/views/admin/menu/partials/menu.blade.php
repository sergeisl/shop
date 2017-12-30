@foreach ($menus as $menu_list)

<option value="{{$menu_list->id or ""}}"

        @isset($menu->id)

        @if ($menu->parent_id == $menu_list->id)
        selected=""
        @endif

        @if ($menu->id == $menu_list->id)
        hidden=""
        @endif

        @endisset

>
    {!! $delimiter or "" !!}{{$menu_list->title or ""}}
</option>

@if (count($menu_list->children) > 0)

    @include('admin.menu.partials.menu', [
      'menus' => $menu_list->children,
      'delimiter'  => ' - ' . $delimiter
    ])

@endif
@endforeach