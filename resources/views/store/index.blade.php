@extends('layouts.app')

@section('content')
    <div class="col-md-2" id="vertical-nav-bar">
        @include('partials.vertical_navigation')
    </div>





    <div class="col-md-10">

        <br/>

        <div id="grid-selector">
            @if ($product_count > 9)
                Намерени 1–9 на <strong> {{ $product_count }} </strong> продукта
            @else
                Намерени <strong> {{ $product_count }} </strong> продукта
            @endif

            <div id="grid-menu">
                View:
                <ul>
                    <li class="largeGrid"><a href="#"><i class="fa fa-th-list"></i></a></li>
                    <li class="smallGrid"><a class="active" href="#"><i class="fa fa-th"></i></a></li>
                </ul>
            </div>
        </div>

        <br/><br/>
        @if(count($products) > 0 )

            <div id="grid">
                @foreach($products as $product)
                    <?php $descriptions = json_decode($product->description, true); ?>
                    <div class="product_content col-md-4">
                        <div class="product">
                            <div class="info-large">
                                    <h4>{{ $descriptions['title_product'] }}</h4>
                                    <div class="sku">
                                        PRODUCT SKU: <strong>89356</strong>
                                    </div>

                                    <div class="price-big">
                                        <span>
                                           @if(isset($descriptions['old_price']))
                                                {{ $descriptions['old_price'] }}
                                                {{ isset($descriptions['currency']) ? $descriptions['currency'] : '' }}
                                           @endif
                                        </span>
                                        {{ isset($descriptions['price']) ? $descriptions['price'] : '' }}
                                        {{ isset($descriptions['currency']) ? $descriptions['currency'] : '' }}
                                    </div>

                                <!--
                                    <h3>COLORS</h3>
                                    <div class="colors-large">
                                        <ul>
                                            <li><a href="" style="background:#222"><span></span></a></li>
                                            <li><a href="" style="background:#6e8cd5"><span></span></a></li>
                                            <li><a href="" style="background:#f56060"><span></span></a></li>
                                            <li><a href="" style="background:#44c28d"><span></span></a></li>
                                        </ul>
                                    </div>

                                    <h3>SIZE</h3>
                                    <div class="sizes-large">
                                        <span>XS</span>
                                        <span>S</span>
                                        <span>M</span>
                                        <span>L</span>
                                        <span>XL</span>
                                        <span>XXL</span>
                                    </div>
-->
                                    <button class="add-cart-large">
                                        Добави
                                    </button>

                                </div>
                            <div class="make3D">
                                    <div class="product-front">
                                        <div class="shadow"></div>

                                        @if (isset($descriptions['main_picture_url']))
                                            <img style="max-width: 400px; max-height: 450px;" src="{{ $descriptions['main_picture_url'] }}"  />
                                        @elseif(isset($descriptions['upload_main_picture']))
                                            <img style="max-width: 400px; max-height: 450px;" src="/storage/upload_pictures/{{ $product->id }}/{{ $descriptions['upload_main_picture'] }}" alt="pic" />
                                        @else
                                            <img style="max-width: 400px; max-height: 450px;" src="/storage/common_pictures/noimage.jpg" alt="pic" />
                                        @endif

                                        <div class="image_overlay"></div>

                                        <div class="add_to_cart">
                                            Добави
                                        </div>

                                        <div class="view_gallery">Галерия</div>
                                        <a href="/store/{{ $product->id }}">
                                        <div class="view_product">Виж подробности
                                        </div>
                                        </a>

                                        <div class="stats">
                                            <div class="stats-container">

                                                <span class="product_name">{{ $descriptions['title_product'] }}</span>
                                                <br/>
                                                <span class="product_price">
                                                    <div>
                                                        <span class="price">

                                                              {{ isset($descriptions['price']) ? $descriptions['price'] : '' }}
                                                              {{ isset($descriptions['currency']) ? $descriptions['currency'] : '' }}

                                                         </span>

                                                        @if(isset($descriptions['old_price']))
                                                            <span class="price_old">
                                                                <del>
                                                                    {{ $descriptions['old_price'] }}
                                                                    {{ isset($descriptions['currency']) ? $descriptions['currency'] : '' }}
                                                                </del>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </span>
                                                <br/>

                                                <div class="product-options">
                                                    <strong></strong>
                                                    <span>
                                                        @foreach($subCategories as $subCategory)
                                                          @if($product->sub_category_id == $subCategory->id)
                                                              {{ $subCategory->name }}
                                                          @endif
                                                       @endforeach
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-back">
                                        <div class="shadow"></div>
                                        <div class="carousel">
                                            <ul class="carousel-container">
                                                @if (isset($descriptions['main_picture_url']))
                                                    <li><img src="{{ $descriptions['main_picture_url'] }}"  /></li>
                                                @elseif(isset($descriptions['upload_main_picture']))
                                                    <li><img src="/storage/upload_pictures/{{ $product->id }}/{{ $descriptions['upload_main_picture'] }}" alt="pic" /></li>
                                                @else
                                                    <li><img src="/storage/common_pictures/noimage.jpg" alt="pic" /></li>
                                                @endif

                                                @if(isset($descriptions['gallery']))
                                                    @foreach( $descriptions['gallery'] as $type_pictures)
                                                        @foreach($type_pictures as $key_picture => $picture)
                                                                <li>
                                                                    @if($key_picture == 'upload_picture')
                                                                        <img src="/storage/upload_pictures/{{ $product->id }}/{{ $type_pictures[$key_picture] }}">
                                                                    @else
                                                                        <img src="{{ $type_pictures[$key_picture] }}">
                                                                    @endif
                                                                </li>
                                                        @endforeach
                                                    @endforeach
                                                @endif

                                            </ul>
                                            <div class="arrows-perspective">
                                                <div class="carouselPrev">
                                                    <div class="y"></div>
                                                    <div class="x"></div>
                                                </div>
                                                <div class="carouselNext">
                                                    <div class="y"></div>
                                                    <div class="x"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flip-back">
                                            <div class="cy"></div>
                                            <div class="cx"></div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div style="margin-left: 10%">
                @if( method_exists($products,'links') )
                    {{  $products ->links() }}
                @endif
            </div>
        @else
            <div style="text-align: center;">
                Резултати от търсенето: <p style="color: #ff7a11;font-size: large;"><h2>Няма намерени резултати!</h2></p>
                <div style="margin-top: -30%">
                    @include('partials.flowers_error')
                    <script>setTimeout(function(){ window.location.href = '/'; }, 3000); </script>
                </div>
            </div>
        @endif
    </div>

    <script>

        $(document).ready(function(){

            $(".largeGrid").click(function(){
                $(this).find('a').addClass('active');
                $('.smallGrid a').removeClass('active');

                $('#grid').find('.product_content').removeClass( "col-md-4" );
                //$( "p" ).removeClass( "myClass noClass" ).addClass( "yourClass" );

                $('.product').addClass('large').each(function(){
                });
                setTimeout(function(){
                    $('.info-large').show();
                }, 200);
                setTimeout(function(){

                    $('.view_gallery').trigger("click");
                }, 400);

                return false;
            });

            $(".smallGrid").click(function(){
                $(this).find('a').addClass('active');
                $('.largeGrid a').removeClass('active');
                $('#grid').find('.product_content').addClass( "col-md-4" );
                //$( "p" ).removeClass( "myClass noClass" ).addClass( "yourClass" );

                $('div.product').removeClass('large');
                $(".make3D").removeClass('animate');
                $('.info-large').fadeOut("fast");
                setTimeout(function(){
                    $('div.flip-back').trigger("click");
                }, 400);
                return false;
            });

            $(".smallGrid").click(function(){
                $('.product').removeClass('large');
                return false;
            });

            $('.colors-large a').click(function(){return false;});


            $('.product').each(function(i, el){

                // Lift card and show stats on Mouseover
                $(el).find('.make3D').hover(function(){
                    $(this).parent().css('z-index', "20");
                    $(this).addClass('animate');
                    $(this).find('div.carouselNext, div.carouselPrev').addClass('visible');
                    $(this).find('.view_product').css('opacity', '1')
                }, function(){
                    $(this).removeClass('animate');
                    $(this).parent().css('z-index', "1");
                    $(this).find('div.carouselNext, div.carouselPrev').removeClass('visible');
                    $(this).find('.view_product').css('opacity', '0')
                });

                // Flip card to the back side
                $(el).find('.view_gallery').click(function(){

                    $(el).find('div.carouselNext, div.carouselPrev').removeClass('visible');
                    $(el).find('.make3D').addClass('flip-10');
                    setTimeout(function(){
                        $(el).find('.make3D').removeClass('flip-10').addClass('flip90').find('div.shadow').show().fadeTo( 80 , 1, function(){
                            $(el).find('.product-front, .product-front div.shadow').hide();
                        });
                    }, 50);

                    setTimeout(function(){
                        $(el).find('.make3D').removeClass('flip90').addClass('flip190');
                        $(el).find('.product-back').show().find('div.shadow').show().fadeTo( 90 , 0);
                        setTimeout(function(){
                            $(el).find('.make3D').removeClass('flip190').addClass('flip180').find('div.shadow').hide();
                            setTimeout(function(){
                                $(el).find('.make3D').css('transition', '100ms ease-out');
                                $(el).find('.cx, .cy').addClass('s1');
                                setTimeout(function(){$(el).find('.cx, .cy').addClass('s2');}, 100);
                                setTimeout(function(){$(el).find('.cx, .cy').addClass('s3');}, 200);
                                $(el).find('div.carouselNext, div.carouselPrev').addClass('visible');
                            }, 100);
                        }, 100);
                    }, 150);
                });

                // Flip card back to the front side
                $(el).find('.flip-back').click(function(){

                    $(el).find('.make3D').removeClass('flip180').addClass('flip190');
                    setTimeout(function(){
                        $(el).find('.make3D').removeClass('flip190').addClass('flip90');

                        $(el).find('.product-back div.shadow').css('opacity', 0).fadeTo( 100 , 1, function(){
                            $(el).find('.product-back, .product-back div.shadow').hide();
                            $(el).find('.product-front, .product-front div.shadow').show();
                        });
                    }, 50);

                    setTimeout(function(){
                        $(el).find('.make3D').removeClass('flip90').addClass('flip-10');
                        $(el).find('.product-front div.shadow').show().fadeTo( 100 , 0);
                        setTimeout(function(){
                            $(el).find('.product-front div.shadow').hide();
                            $(el).find('.make3D').removeClass('flip-10').css('transition', '100ms ease-out');
                            $(el).find('.cx, .cy').removeClass('s1 s2 s3');
                        }, 100);
                    }, 150);

                });

                makeCarousel(el);
            });

            $('.add-cart-large').each(function(i, el){
                $(el).click(function(){
                    var carousel = $(this).parent().parent().find(".carousel-container");
                    var img = carousel.find('img').eq(carousel.attr("rel"))[0];
                    var position = $(img).offset();

                    var productName = $(this).parent().find('h4').get(0).innerHTML;

                    $("body").append('<div class="floating-cart"></div>');
                    var cart = $('div.floating-cart');
                    $("<img src='"+img.src+"' class='floating-image-large' />").appendTo(cart);

                    $(cart).css({'top' : position.top + 'px', "left" : position.left + 'px'}).fadeIn("slow").addClass('moveToCart');
                    setTimeout(function(){$("body").addClass("MakeFloatingCart");}, 800);

                    setTimeout(function(){
                        $('div.floating-cart').remove();
                        $("body").removeClass("MakeFloatingCart");


                        var cartItem = "<div class='cart-item'><div class='img-wrap'><img src='"+img.src+"' alt='' /></div><span>"+productName+"</span><strong>$39</strong><div class='cart-item-border'></div><div class='delete-item'></div></div>";

                        $("#cart .empty").hide();
                        $("#cart").append(cartItem);
                        $("#checkout").fadeIn(500);

                        $("#cart .cart-item").last()
                                .addClass("flash")
                                .find(".delete-item").click(function(){
                                    $(this).parent().fadeOut(300, function(){
                                        $(this).remove();
                                        if($("#cart .cart-item").size() == 0){
                                            $("#cart .empty").fadeIn(500);
                                            $("#checkout").fadeOut(500);
                                        }
                                    })
                                });
                        setTimeout(function(){
                            $("#cart .cart-item").last().removeClass("flash");
                        }, 10 );

                    }, 1000);


                });
            })

            /* ----  Image Gallery Carousel   ---- */
            function makeCarousel(el){


                var carousel = $(el).find('.carousel ul');
                var carouselSlideWidth = 315;
                var carouselWidth = 0;
                var isAnimating = false;
                var currSlide = 0;
                $(carousel).attr('rel', currSlide);

                // building the width of the casousel
                $(carousel).find('li').each(function(){
                    carouselWidth += carouselSlideWidth;
                });
                $(carousel).css('width', carouselWidth);

                // Load Next Image
                $(el).find('div.carouselNext').on('click', function(){
                    var currentLeft = Math.abs(parseInt($(carousel).css("left")));
                    var newLeft = currentLeft + carouselSlideWidth;
                    if(newLeft == carouselWidth || isAnimating === true){return;}
                    $(carousel).css({'left': "-" + newLeft + "px",
                        "transition": "300ms ease-out"
                    });
                    isAnimating = true;
                    currSlide++;
                    $(carousel).attr('rel', currSlide);
                    setTimeout(function(){isAnimating = false;}, 300);
                });

                // Load Previous Image
                $(el).find('div.carouselPrev').on('click', function(){
                    var currentLeft = Math.abs(parseInt($(carousel).css("left")));
                    var newLeft = currentLeft - carouselSlideWidth;
                    if(newLeft < 0  || isAnimating === true){return;}
                    $(carousel).css({'left': "-" + newLeft + "px",
                        "transition": "300ms ease-out"
                    });
                    isAnimating = true;
                    currSlide--;
                    $(carousel).attr('rel', currSlide);
                    setTimeout(function(){isAnimating = false;}, 300);
                });
            }

            $('.sizes a span, .categories a span').each(function(i, el){
                $(el).append('<span class="x"></span><span class="y"></span>');

                $(el).parent().on('click', function(){
                    if($(this).hasClass('checked')){
                        $(el).find('.y').removeClass('animate');
                        setTimeout(function(){
                            $(el).find('.x').removeClass('animate');
                        }, 50);
                        $(this).removeClass('checked');
                        return false;
                    }

                    $(el).find('.x').addClass('animate');
                    setTimeout(function(){
                        $(el).find('.y').addClass('animate');
                    }, 100);
                    $(this).addClass('checked');
                    return false;
                });
            });

            $('.add_to_cart').click(function(){
                var productCard = $(this).parent();
                var position = productCard.offset();
                var productImage = $(productCard).find('img').get(0).src;
                var productName = $(productCard).find('.product_name').get(0).innerHTML;

                $("body").append('<div class="floating-cart"></div>');
                var cart = $('div.floating-cart');
                productCard.clone().appendTo(cart);

                $(cart).css({'top' : position.top + 'px', "left" : position.left + 'px'}).fadeIn("slow").addClass('moveToCart');
                //$(cart).css({'top' : position.top + 'px', "left" : position.left + 500 }).fadeIn("slow").addClass('moveToCart');
                setTimeout(function(){$("body").addClass("MakeFloatingCart");}, 800);
                setTimeout(function(){
                    $('div.floating-cart').remove();
                    $("body").removeClass("MakeFloatingCart");


                    var cartItem = "<div class='cart-item'><div class='img-wrap'><img src='"+productImage+"' alt='' /></div><span>"+productName+"</span><strong>$39</strong><div class='cart-item-border'></div><div class='delete-item'></div></div>";

                    $("#cart .empty").hide();
                    $("#cart").append(cartItem);
                    $("#checkout").fadeIn(500);

                    $("#cart .cart-item").last()
                            .addClass("flash")
                            .find(".delete-item").click(function(){
                                $(this).parent().fadeOut(300, function(){
                                    $(this).remove();
                                    if($("#cart .cart-item").size() == 0){
                                        $("#cart .empty").fadeIn(500);
                                        $("#checkout").fadeOut(500);
                                    }
                                })
                            });
                    setTimeout(function(){
                        $("#cart .cart-item").last().removeClass("flash");
                    }, 10 );

                }, 1000);
            });
        });
    </script>

@endsection