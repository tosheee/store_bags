<nav class="navbar navbar-main navbar-default" id="navbar-main-navbar-default" role="navigation" style="opacity: 1;">
    <div class="container">
        <!-- Brand and toggle -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links,  -->
        <div class="collapse navbar-collapse navbar-1" style="margin-top: 0px;">
            <ul class="nav navbar-nav">
                <li class="dropdown megaDropMenu">
                    <a href="/store" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false" id="store-button">Продукти <i class="fa fa-angle-down ml-5"></i></a>
                    <ul class="dropdown-menu row">
                        @foreach($categoriesButtonsName as $categoryButton)
                            <li class="col-sm-3 col-xs-12">
                                <ul class="list-unstyled">
                                    <li><a href="/store/search?category={{ $categoryButton->id }}"><strong>{{ $categoryButton->name }}</strong></a></li>
                                    @foreach($subCategoriesButtonsName as $subCategoryButton)
                                        @if ($subCategoryButton->category_id == $categoryButton->id)
                                            <li><a href="/store/search?sub_category={{ $subCategoryButton->identifier }}">{{ $subCategoryButton->name }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>




                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Page <i class="fa fa-angle-down ml-5"></i></a>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Register</a></li>
                        <li><a href="#">Register or Login</a></li>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Password Recovery</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">404 Not Found</a></li>
                        <li><a href="#">Short Code</a></li>
                        <li><a href="#">Coming Soon</a></li>
                    </ul>
                </li>






                <script>
                    $(document).ready(function(){
                        $('#store-button').click(function(){
                            window.location.href ='/store'
                        });
                    });
                </script>
                @foreach($pagesButtonsRender as $pageButton)
                    <li><a href="/page?show={{ $pageButton->url_page }}" class="dropdown-toggle"  data-hover="dropdown" data-close-others="false">{{ $pageButton->name_page }}</a></li>
                @endforeach




            </ul>


            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"></a></li>
                <li>
                    <div id="wrap-search">
                        <form action="" autocomplete="on">
                            <input id="search" name="search" type="text" placeholder="What're we looking for ?"><input id="search_submit" value="Rechercher" type="submit">
                        </form>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-user mr-5"></i><span class="hidden-xs">Профил<i class="fa fa-angle-down ml-5"></i></span> </a>
                    <ul class="dropdown-menu w-150" role="menu">
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Вход</a></li>
                            <li><a href="{{ route('register') }}">Регистрация</a></li>
                        @else
                            <li><a href="#">{{ Auth::user()->name }}</a></li>
                            <li><a href="/store/view_user_orders/{{ Auth::user()->id }}">Моите поръчки</a></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Изход</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </li>
                        @endif
                    </ul>
                </li>

                <li class="dropdown" id="menu-scroll-cart">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-cart-plus mr-5"></i> <span class="hidden-xs">
                                Количка <strong><sup class="text-primary">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</sup></strong>
                                <i class="fa fa-angle-down ml-5"></i>
                            </span> </a>

                    <?php
                    if(Session::has('cart'))
                    {
                        $oldCart = Session::get('cart');
                        $cart = new App\Cart($oldCart);
                        $productsCart = $cart->items;
                    }
                    ?>

                    <ul class="dropdown-menu cart w-250" role="menu">
                        <li>
                            <div class="cart-items">
                                <ol class="items">
                                    @if(isset($productsCart))
                                        @foreach($productsCart as $product)
                                            <?php $descriptions = json_decode($product['item']->description, true); ?>

                                            <li>
                                                @if(isset($descriptions['main_picture_url']))
                                                    <a href="#" class="product-image"> <img src="{{ $descriptions['main_picture_url'] }}" class="img-responsive" alt=""> </a>
                                                @elseif(isset($descriptions['upload_main_picture']))
                                                    <a href="#" class="product-image"> <img src="/storage/upload_pictures/{{ $product['item']->id }}/{{ $descriptions['upload_main_picture'] }}" class="img-responsive" alt=""> </a>
                                                @else
                                                    <a href="#" class="product-image"> <img src="/storage/common_pictures/noimage.jpg" class="img-responsive" alt=""> </a>
                                                @endif

                                                <div class="product-details">
                                                    <div class="close-icon">
                                                        <button type="button" class="remove-item-button" style="background: transparent; border-color: #ffffff; border-style: solid;">
                                                            <input id="id-product" type="hidden" value="{{ $product['item']->id }}"/>
                                                            <i class="fa fa-close" style="color: #ff0000"></i>
                                                        </button>
                                                    </div>
                                                    <p class="product-name"> <a href="/store/{{ $product['item']->id }}" target="_blank">{{ $descriptions['title_product'] }}</a> </p>
                                                    <strong>{{ $product['qty']}}</strong> x <span class="price text-primary">{{ $descriptions['price'] }}  {{ $descriptions['currency'] }}</span>
                                                </div>
                                                <!-- end product-details -->
                                            </li>
                                        @endforeach
                                        <p class="text-center"><h5>Общо: <strong> {{ $cart->totalPrice }} {{ $descriptions['currency'] }}</strong></h5></p>

                                </ol>
                            </div>
                        </li>
                        <li>
                            <div class="cart-footer">
                                <a href="{{ route('store.shoppingCart') }}" class="pull-left"><i class="fa fa-cart-plus mr-5"></i> Количка</a>
                                <a href="{{ route('store.checkout') }}" class="pull-right"><i class="fa fa-money" aria-hidden="true"></i> Поръчка</a>
                            </div>
                        </li>
                    </ul>
                </li>
                @else
                    <li style="text-align: center;">
                        Вашата количката е празна!
                    </li>
                @endif
            </ul>



        </div><!-- /.navbar-collapse -->
    </div>
</nav>