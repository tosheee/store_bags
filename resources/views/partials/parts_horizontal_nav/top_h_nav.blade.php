<nav class="topBar">
    <div class="container">

        <div class="navbar-header">

            <a class="navbar-brand" href="#"><img width="200" height="70" src="https://ebags.bg/image/data/124567789.png" alt=""/></a>
        </div>


        <ul class="list-inline pull-left">
        </ul>

        <div id="modal-contact-form-wrapper" class="modal-contact-forma-c">
            <div class="modal-content-contact-form">
                <span class="close">&times;</span>
                <div class="col-md-12 text-center">
                    <h3>Свържете се с нас</h3>
                    <p>
                        Чуствайте се свободни да използвате формата за контакт по-долу.
                    </p>
                </div>

                <form name="contactForm" id="contact_form" method="post" action="/send-user-message" style="font-family: 'Helvetica Neue', Helvetica;">
                    {{ csrf_field() }}
                    <div class="row">
                        <div>
                            <input type="text" name="name" id="name" required="required" oninvalid="this.setCustomValidity('Моля, въведете име!')" oninput="setCustomValidity('')" value="{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}" class="form-control" placeholder="Вашето име">
                        </div>

                        <br>

                        <div>
                            <input type="text" name="email" id="email" required="required" oninvalid="this.setCustomValidity('Моля, въведете имейл!')" oninput="setCustomValidity('')" value="{{ isset(Auth::user()->email) ? Auth::user()->email : '' }}" class="form-control" placeholder="Вашия имейл">
                        </div>

                        <br>

                        <div>
                            <textarea name="message" id="message" required="required" oninvalid="this.setCustomValidity('Моля, въведете съобщение!')" oninput="setCustomValidity('')" class="form-control" placeholder="Съобщение"></textarea>
                        </div>

                        <br>

                        <div class="col-md-12">
                            <p id="submit">
                                <input type="submit" id="send_message" value="Изпрати" class="btn btn-border">
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script>

            var modalContactForm = document.getElementById('modal-contact-form-wrapper');
            var btnViewContact = document.getElementById("view-contact-form");
            var spanContactForm = document.getElementsByClassName("close")[0];

            btnViewContact.onclick = function() {
                modalContactForm.style.display = "block";
            }

            spanContactForm.onclick = function() {
                modalContactForm.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modalContactForm) {
                    modalContactForm.style.display = "none";
                }
            }
        </script>



        <ul class="topBarNav pull-right">
            <li>
                <div id="wrap-search">
                    <form action="" autocomplete="on">
                        <input id="search" name="search" type="text" placeholder="What're we looking for ?"><input id="search_submit" value="Rechercher" type="submit">
                    </form>
                </div>
            </li>

            <li class="dropdown">

            </li>



            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">
                    <img src="http://icons.iconarchive.com/icons/osiris/world-flags/16/00-cctld-bg-icon.png" class="mr-5" alt="">
                    <span class="hidden-xs"> Bulgarian <i class="fa fa-angle-down ml-5"></i></span>
                </a>
                <ul class="dropdown-menu w-100" role="menu">

                </ul>
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
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Изход
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </li>

            <li id="new-view-cart" class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">
                    <i class="fa fa-cart-plus mr-5"></i>
                    <span class="hidden-xs">Количка
                        <strong>
                            <sup class="text-primary">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</sup>
                        </strong>
                        <i class="fa fa-angle-down ml-5"></i>
                    </span>
                </a>

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
                                                <p class="product-name">
                                                    <a href="/store/{{ $product['item']->id }}" target="_blank">{{ $descriptions['title_product'] }}</a>
                                                </p>
                                                <strong id="product-qty">{{ $product['qty']}}</strong> x <span class="price text-primary">{{ $descriptions['price'] }}  {{ $descriptions['currency'] }}</span>
                                            </div>
                                            <!-- end product-details -->
                                        </li>

                                    @endforeach
                                    <p class="text-center"><h5>Общо: <strong id="nav-total-price"> {{ $cart->totalPrice }}</strong> <strong>{{ $descriptions['currency'] }}</strong></h5></p>


                            </ol>
                        </div>
                    </li>
                    <li>
                        <div class="cart-footer">
                            <a href="{{ route('store.shoppingCart') }}" class="pull-left"><i class="fa fa-cart-plus mr-5"></i> Количка</a>
                            <a href="{{ route('store.checkout') }}" class="pull-right"><i class="fa fa-money" aria-hidden="true"></i> Поръчка</a>
                        </div>

                    </li>
                    @else
                        <li style="text-align: center;">
                            Вашата количката е празна!
                        </li>
                    @endif
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!--=========-TOP_BAR============-->
