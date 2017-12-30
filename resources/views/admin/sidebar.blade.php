<div class="col-md-3">
    <div class="panel panel-default panel-flush">
        <div class="panel-heading">
            Мой магазин
            панель управления
        </div>

        <div class="panel-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin') }}">
                        Админ
                    </a>
                    <a href="{{ url('/admin/menu') }}">
                        Меню
                    </a>
                    <a href="{{ url('/admin/categories') }}">
                        Категории
                    </a>
                    <a href="{{ url('/admin/products') }}">
                        Товары
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
