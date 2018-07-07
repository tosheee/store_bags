@extends('layouts.app')

@section('content')
    <style>
        @charset "utf-8";

        .basket strong {
            font-weight: bold;
        }

        .basket p {
            margin: 0.75rem 0 0;
        }

        .basket h1 {
            font-size: 0.75rem;
            font-weight: normal;
            margin: 0;
            padding: 0;
        }

        .basket input,
        .basket button {
            border: 0 none;
            outline: 0 none;
        }

        .basket button {
            background-color: #666;

        }

        .basket button:hover,
        .basket button:focus {
            background-color: #555;
        }

        .basket img,
        .basket .basket-module,
        .basket .basket-labels,
        .basket .basket-product {
            width: 100%;
        }

        input,
        button,
        .basket,
        .basket-module,
        .basket-labels,
        .item,
        .price,
        .quantity,
        .subtotal,
        .basket-product,
        .product-image,
        .product-details {
            float: left;
        }

        .basket .hide {
            display: none;
        }

        .basket main {
            clear: both;
            font-size: 0.75rem;
            margin: 0 auto;
            overflow: hidden;
            padding: 1rem 0;
            width: 960px;
        }

        .basket,
        aside {
            padding: 0 1rem;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .basket {
            width: 70%;
        }

        .basket-module {
            color: #111;
        }

        .basket label {
            display: block;
            margin-bottom: 0.3125rem;
        }

        .basket .basket-labels {
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            margin-top: 1.625rem;
        }



        .basket li.price:before,
        .basket li.subtotal:before {
            content: '';
        }

        .basket .item {
            width: 55%;
        }

        .basket .price,
        .quantity,
        .subtotal {
            width: 15%;
        }

        .subtotal {
            text-align: right;
        }

        .remove {
            bottom: 1.125rem;
            float: right;
            position: absolute;
            right: 0;
            text-align: right;
            width: 45%;
        }

        .remove button {
            background-color: transparent;
            color: #777;
            float: none;
            text-decoration: underline;
            text-transform: uppercase;
        }

        .item-heading {
            padding-left: 4.375rem;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .basket-product {
            border-bottom: 1px solid #ccc;
            padding: 1rem 0;
            position: relative;
        }
        .basket-product:hover {
            background-color: #e0f5e9;
            border-bottom: 1px solid #ccc;
            padding: 1rem 0;
            position: relative;
        }

        .product-image {
            width: 35%;
        }

        .product-details {
            width: 65%;
        }

        .product-frame {
            border: 1px solid #aaa;
        }

        .product-details {
            padding: 0 1.5rem;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .quantity-field {
            background-color: #ccc;
            border: 1px solid #aaa;
            border-radius: 4px;
            font-size: 1.5rem;
            padding: 2px;
            width: 3.75rem;
        }

        aside {
            top: 80px;
            float: right;
            position: relative;
            width: 30%;
        }

        .summary {
            background-color: #eee;
            border: 1px solid #aaa;
            padding: 1rem;
            position: fixed;
            width: 250px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .summary-total-items {
            color: #666;
            font-size: 0.875rem;
            text-align: center;
        }

        .summary-subtotal,
        .summary-total {
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            clear: both;
            margin: 1rem 0;
            overflow: hidden;
            padding: 0.5rem 0;
        }

        .subtotal-title,
        .subtotal-value,
        .total-title,
        .total-value,
        .promo-title,
        .promo-value {
            color: #111;
            float: left;
            width: 50%;
        }

        .summary-promo {
            -webkit-transition: all .3s ease;
            -moz-transition: all .3s ease;
            -o-transition: all .3s ease;
            transition: all .3s ease;
        }

        .promo-title {
            float: left;
            width: 70%;
        }

        .promo-value {
            color: #8B0000;
            float: left;
            text-align: right;
            width: 30%;
        }

        .summary-delivery {
            padding-bottom: 3rem;
        }

        .subtotal-value,
        .total-value {
            text-align: right;
        }

        .total-title {
            font-weight: bold;
            text-transform: uppercase;
        }

        .summary-checkout {
            display: block;
        }

        .checkout-cta {
            display: block;
            float: none;
            font-size: 0.75rem;
            text-align: center;
            text-transform: uppercase;
            padding: 0.625rem 0;
            width: 100%;
        }


        @media screen and (max-width: 640px) {
            aside,
            .basket,
            .summary,
            .item,
            .remove {
                width: 100%;
            }
            .basket-labels {
                display: none;
            }
            .basket-module {
                margin-bottom: 1rem;
            }
            .item {
                margin-bottom: 1rem;
            }
            .product-image {
                width: 40%;
            }
            .product-details {
                width: 60%;
            }
            .price,
            .subtotal {
                width: 33%;
            }
            .quantity {
                text-align: center;
                width: 34%;
            }
            .quantity-field {
                float: none;
            }
            .remove {
                bottom: 0;
                text-align: left;
                margin-top: 0.75rem;
                position: relative;
            }
            .remove button {
                padding: 0;
            }
            .summary {
                margin-top: 1.25rem;
                position: relative;
            }
        }

        @media screen and (min-width: 641px) and (max-width: 960px) {
            aside {
                padding: 0 1rem 0 0;
            }
            .summary {
                width: 28%;
            }
        }

        @media screen and (max-width: 960px) {
            main {
                width: 100%;
            }
            .product-details {
                padding: 0 1rem;
            }
        }
    </style>

    <div class="col-md-2" id="vertical-nav-bar">
        @include('partials.vertical_navigation')
    </div>

    <script>
        $('#new-view-cart').hide();
        $('#menu-scroll-cart').hide();
    </script>

    <br/><br/><br/>
    <div class="col-sm-10">
        @if(count($products) > 0)
            <div class="basket">

                <div class="basket-module">
                    <h3>Количка за пазаруване</h3>
                </div>

                <div class="basket-labels">
                    <ul>
                        <li class="item item-heading">Продукт</li>
                        <li class="price">Цена</li>
                        <li class="quantity">Количество</li>
                        <li class="subtotal">Общо</li>
                    </ul>
                </div>

                @foreach($products as $product)
                    <?php $descriptions = json_decode($product['item']->description, true); ?>

                    <div class="basket-product">
                        <div class="item">
                            <div class="product-image">
                                @if (isset($descriptions['main_picture_url']))
                                    <a class="thumbnail pull-left" href="/store/{{ $product['item']->id}}">
                                        <img   src="{{ $descriptions['main_picture_url'] }}" alt="pic" />
                                    </a>
                                @elseif(isset($descriptions['upload_main_picture']))
                                    <a class="thumbnail pull-left" href="/store/{{ $product['item']->id }}">
                                        <img  src="/storage/upload_pictures/{{ $product['item']->id }}/{{ $descriptions['upload_main_picture'] }}" alt="pic" />
                                    </a>
                                @else
                                    <a class="thumbnail pull-left" href="/store/{{ $product['item']->id }}">
                                        <img  src="/storage/common_pictures/noimage.jpg" alt="pic" />
                                    </a>
                                @endif
                            </div>

                            <div class="product-details">
                                <h4><a href="/store/{{ $product['item']->id }}" target="_blank">{{ $descriptions['title_product'] }}</a></h4>
                                <p><strong></strong></p>
                                <p>Продуктов код: {{ $descriptions['article_id'] }}</p>
                            </div>

                        </div>

                        <div class="price"><strong>{{ number_format($descriptions['price'], 2) }}</strong> {{ $descriptions['currency'] }}</div>

                        <div class="quantity">
                            <input type="number" value="{{ $product['qty'] }}" min="1" class="quantity-field">
                            <input id="id-product" type="hidden" name="q" value="{{ $product['item']['id'] }}"/>
                        </div>

                        <div class="subtotal">{{ number_format($product['qty'] * $descriptions['price'], 2) }}  {{ $descriptions['currency'] }}</div>

                        <div class="remove">
                            <button type="button" class="remove-item-button" style="width:40%; background-color: #ff4208; border-color:#ff4208; " title="Премахване на продукт">
                                <i class="fa fa-close" style="color: #ffffff"></i>
                                <input id="id-product" type="hidden" value="{{ $product['item']->id }}"/>
                            </button>

                        </div>

                    </div>
                @endforeach

            </div>
            <aside>
            <div class="summary">
                <div class="summary-total-items" style="font-size: 1.2em;">Информация за поръчката<span class="total-items"></span></div>

                <div class="summary-subtotal">
                    <div class="subtotal-title">Общ брой:</div>
                    <div class="subtotal-value final-value" id="basket-subtotal">{{ $totalQuantity }} бр.</div>
                    <div class="summary-promo hide">
                        <div class="promo-title">Promotion</div>
                        <div class="promo-value final-value" id="basket-promo"></div>
                    </div>
                </div>

                <div class="summary-delivery">
                    Куриерската услуга не е включена в цената и е за сметка на купувача.
                </div>

                <div class="summary-total">
                    <div class="total-title">Общо:</div>
                    <div class="total-value final-value" id="basket-total">{{ $totalPrice }} лв.</div>
                </div>

                <div class="summary-checkout">
                    <button class="checkout-cta" onclick="location.href='/checkout'">Продължи</button>
                </div>
            </div>
        </aside>
        @else
            @include('partials.empty_cart')
            <h3>Количка за пазаруване е празна!</h3>
            </div>

        @endif
    </div>

    <script>
        $( ".quantity-field" ).click(function() {
            var quantity_wrapper = $(this).parent();
            var idProduct = quantity_wrapper.find('#id-product').val();
            var  quantityProduct = $(this).val();
            var priceProduct = quantity_wrapper.parent().find('.price strong').html();

            quantity_wrapper.parent().find('.subtotal').html(parseFloat(priceProduct * quantityProduct).toFixed(2) + ' лв.');

            $.ajax({
                method: "POST",
                url: "/add-to-cart?product_id=" + idProduct + "&product_quantity=" + quantityProduct,
                data: { "_token": $('meta[name="_token"]').attr('content') },
                success: function( new_cart ) {
                    updateCart(new_cart);
                }
            });
        });

        $('.remove').on('click','.remove-item-button', function() {
            var remove_item_button = $(this);
            var idProduct = $(this).find('#id-product').val();

            $.ajax({
                method: "post",
                url: "/remove/" + idProduct,
                data: { "_token": $('meta[name="_token"]').attr('content') },
                success: function( new_cart ) {

                    if(new_cart[0] == 0)
                    {
                        window.location.href = '/';
                    }
                    else
                    {
                        updateCart(new_cart)
                    }

                    var row_tr = remove_item_button.parent().parent();
                    row_tr.remove();
                }
            });
        });



       function updateCart(new_cart){
           $('#nav-total-price').html(new_cart[0]);
           $('ol.items').children().remove();
           $('sup.text-primary').html(new_cart[1]);
           var items_obj = $.each( new_cart[2], function( _, value ){ value });

           $.each(items_obj, function(product_id, value){
               $('ol.items').append('<li><a href="#" class="product-image"><img src=" '+ value['item_pic'] +' "class="img-responsive"></a>'
               + '<div class="product-details">'
               + '<div class="close-icon">'
               + '<button type="button" class="remove-item-button btn-danger" style="background: transparent; border-color: #ffffff; border-style: solid;" >'
               + '<input id="id-product" type="hidden" value="'+ product_id +'"/>'
               + '<i class="fa fa-close" style="color: #ff0000"></i>'
               + '</button>'
               + ' </div>'
               + '<p class="product-name"> <a href="/store/'+ product_id +'" target="_blank">'+ value['item_title'] +'</a></p>'
               + '<strong id="product-qty">'+ value['qty'] +'</strong> x <span class="price text-primary">'+ value['item_price'] +' лв.</span>'
               + '</div></li>');
           });

           $('ol.items').append('<h5 class="cart-bottom-total-price">Общо: '+ parseFloat(new_cart[0]).toFixed(2) +' лв.</h5>').css({'text-align': 'center', 'color': '#000000'});

           if($('div.cart-footer').length < 1){
               $('ul.dropdown-menu.cart.w-250').append(
                       '<li>'
                       + '<div class="cart-footer">'
                       + '<a href="/shopping-cart" class="pull-left"><i class="fa fa-cart-plus mr-5"></i> Количка</a>'
                       + '<a href="/checkout" class="pull-right"><i class="fa fa-money" aria-hidden="true"></i> Плащане</a>'
                       + '</div>'
                       + '</li>'
               );
           }

           $('#basket-total').html(parseFloat(new_cart[0]).toFixed(2) + ' лв.')
           $('#basket-subtotal').html(new_cart[1] + ' бр.')
       }
    </script>


@endsection