<div id="sidebar">
    <h3>CART</h3>
    <div id="cart">
        <span class="empty">No items in cart.</span>
    </div>

    <h3>Категории</h3>
    <div class="checklist categories">
        <ul>
            @foreach($subCategoriesButtonsName as $sub_category_vertical_button)
                <li><a href=""><span></span>{{ $sub_category_vertical_button->name }}</a></li>
            @endforeach

        </ul>
    </div>

    <h3>Цветове</h3>
    <div class="checklist colors">
        <ul>
            <li><a href=""><span></span>Beige</a></li>
            <li><a href=""><span style="background:#222"></span>Black</a></li>
            <li><a href=""><span style="background:#6e8cd5"></span>Blue</a></li>
            <li><a href=""><span style="background:#f56060"></span>Brown</a></li>
            <li><a href=""><span style="background:#44c28d"></span>Green</a></li>
        </ul>

        <ul>
            <li><a href=""><span style="background:#999"></span>Grey</a></li>
            <li><a href=""><span style="background:#f79858"></span>Orange</a></li>
            <li><a href=""><span style="background:#b27ef8"></span>Purple</a></li>
            <li><a href=""><span style="background:#f56060"></span>Red</a></li>
            <li><a href=""><span style="background:#fff;border: 1px solid #e8e9eb;width:13px;height:13px;"></span>White</a></li>
        </ul>
    </div>

    <h3>Размер</h3>
    <div class="checklist sizes">
        <ul>
            <li><a href=""><span></span>XS</a></li>
            <li><a href=""><span></span>S</a></li>
            <li><a href=""><span></span>M</a></li>
        </ul>

        <ul>
            <li><a href=""><span></span>L</a></li>
            <li><a href=""><span></span>XL</a></li>
            <li><a href=""><span></span>XXL</a></li>
        </ul>
    </div>

</div>