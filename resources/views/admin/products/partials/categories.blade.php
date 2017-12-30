@foreach ($categories as $category)

    <option value="{{$category->id or ""}}"

            @isset($product->id)
            @foreach ($product->categories as $category_article)
            @if ($category->id == $category_article->id)
            selected="selected"
            @endif
            @endforeach
            @endisset

    >
        {!! $delimiter or "" !!}{{$category->name or ""}}
    </option>

    @if (count($category->children) > 0)

        @include('admin.products.partials.categories', [
          'categories' => $category->children,
          'delimiter'  => ' - ' . $delimiter
        ])

    @endif
@endforeach