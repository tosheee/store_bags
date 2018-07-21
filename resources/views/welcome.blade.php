@extends('layouts.app')

@section('content')
    <style>

        #carousel-example-generic.carousel {
            width: 99%;
            margin: 0 auto;

        }

        /* Carousel Styles */
        #carousel-example-generic .carousel-indicators .active {
            background-color: #2980b9;
        }
        #carousel-example-generic .carousel-indicators {
            position: absolute;
            margin: 0 auto;
            bottom: 12%;
            left: 50%;
            z-index: 15;
            width: 60%;
            padding-left: 0;
            list-style: none;
            text-align: center;
        }

        #carousel-example-generic .carousel-indicators .active {
            background-color: #2980b9;
        }

        #carousel-example-generic .carousel-inner img {
            width: 100%;
            max-height: 460px
        }

        #carousel-example-generic .carousel-control {
            width: 90%;
            osition: absolute;
            top: 50%;
            left: 5%;
            bottom: 0;
            opacity: .5;
            filter: alpha(opacity=50);
            font-size: 20px;
            color: #fff;
            text-align: center;
            text-shadow: 0 1px 2px rgba(0,0,0,.6);
        }

        #carousel-example-generic .carousel-control.left,
        #carousel-example-generic .carousel-control.right {
            opacity: 1;
            filter: alpha(opacity=100);
            background-image: none;
            background-repeat: no-repeat;
            text-shadow: none;
        }

        #carousel-example-generic .carousel-control.left span {
            padding: 15px;
        }

        #carousel-example-generic .carousel-control.right span {
            padding: 15px;
        }

        #carousel-example-generic .carousel-control .glyphicon-chevron-left,
        #carousel-example-generic .carousel-control .glyphicon-chevron-right,
        #carousel-example-generic .carousel-control .icon-prev,
        #carousel-example-generic .carousel-control .icon-next {
            position: absolute;
            top: 45%;
            z-index: 5;
            display: inline-block;
        }

        #carousel-example-generic .carousel-control .glyphicon-chevron-left,
        #carousel-example-generic .carousel-control .icon-prev {
            left: 0;
        }

        #carousel-example-generic .carousel-control .glyphicon-chevron-right,
        #carousel-example-generic .carousel-control .icon-next {
            right: 0;
        }


        #carousel-example-generic .carousel-control.left span:hover,
        #carousel-example-generic .carousel-control.right span:hover {
            opacity: .7;
            filter: alpha(opacity=70);
        }

        #carousel-example-generic .header-text {
            position: absolute;
            top: 20%;
            left: 1.8%;
            right: auto;
            width: 96.66666666666666%;
            color: #fff;
        }

        #carousel-example-generic .header-text h2 {
            font-size: 40px;
        }

        #carousel-example-generic .header-text h2 span {
            background-color: #2980b9;
            padding: 10px;
        }

        #carousel-example-generic .header-text h3 span {
            background-color: #000;
            padding: 15px;
        }

        #carousel-example-generic .btn-min-block {
            min-width: 170px;
            line-height: 26px;
        }

        #carousel-example-generic .btn-theme {
            color: #fff;
            background-color: transparent;
            border: 2px solid #fff;
            margin-right: 15px;
        }

        #carousel-example-generic .btn-theme:hover {
            color: #000;
            background-color: #fff;
            border-color: #fff;
        }
        .slider_titles{
            color: #fa5a7f;
            text-align: center;
            font-family: 'Marck Script', cursive;
            font-size: 3em;
            margin-bottom: 5%;
        }

    </style>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <!-- Carousel -->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="https://cdn.shopify.com/s/files/1/0949/5440/products/IMG_5790EDIT_1024x1024.jpg?v=1480510669" alt="First slide">
                <!-- Static Header -->
                <div class="header-text hidden-xs">
                    <div class="col-md-12 text-center">
                        <h2>
                            <span>Welcome to <strong>LOREM IPSUM</strong></span>
                        </h2>
                        <br>
                        <h3>
                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                        </h3>
                        <br>
                        <div class="">
                            <a class="btn btn-theme btn-sm btn-min-block" href="#">Login</a><a class="btn btn-theme btn-sm btn-min-block" href="#">Register</a></div>
                    </div>
                </div><!-- /header-text -->
            </div>
            <div class="item">
                <img src="https://hips.hearstapps.com/bpc.h-cdn.co/assets/17/41/1600x800/landscape-1507667726-vegan-bags.jpg?resize=768:*" alt="Second slide">
                <!-- Static Header -->
                <div class="header-text hidden-xs">
                    <div class="col-md-12 text-center">
                        <h2>
                            <span>Welcome to LOREM IPSUM</span>
                        </h2>
                        <br>
                        <h3>
                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                        </h3>
                        <br>
                        <div class="">
                            <a class="btn btn-theme btn-sm btn-min-block" href="#">Login</a><a class="btn btn-theme btn-sm btn-min-block" href="#">Register</a></div>
                    </div>
                </div><!-- /header-text -->
            </div>
            <div class="item">
                <img src="http://uiconstock.com/wp-content/uploads/2015/12/Free-Shopping-Bag-Mockup.jpg" alt="Third slide">
                <!-- Static Header -->
                <div class="header-text hidden-xs">
                    <div class="col-md-12 text-center">
                        <h2>
                            <span>Welcome to LOREM IPSUM</span>
                        </h2>
                        <br>
                        <h3>
                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                        </h3>
                        <br>
                        <div class="">
                            <a class="btn btn-theme btn-sm btn-min-block" href="#">Login</a><a class="btn btn-theme btn-sm btn-min-block" href="#">Register</a></div>
                    </div>
                </div><!-- /header-text -->
            </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div><!-- /carousel -->

    <div class="slider-item-content">

            @if(count($productsSale) > 0)
            <hr/>
            <h1 class="slider_titles">Разпродажба</h1>

            <div class="owl-carousel" id="slider_product_sale">
                    @foreach($productsSale as $prSale)
                        <?php $descriptSale = json_decode($prSale->description, true); ?>
                            @if (isset($descriptSale['main_picture_url']))
                                <div class="item" style="background-image: url('{{ $descriptSale['main_picture_url'] }}');">
                            @elseif(isset($descriptSale['upload_main_picture']))
                                <div class="item" style="background-image: url('/storage/upload_pictures/{{ $prSale->id }}/{{ $descriptSale['upload_main_picture'] }}');">
                            @else
                                <div class="item" style="background-image: url('/storage/common_pictures/noimage.jpg');">
                            @endif
                                    <a href="/store/{{ $prSale->id }}/">{{ $descriptSale['title_product'] }}</a>
                                     <span class="product_price">
                                                    <div>
                                                        <span class="price">

                                                            <strong>
                                                                {{ isset($descriptSale['price']) ? $descriptSale['price'] : '' }}
                                                                {{ isset($descriptSale['currency']) ? $descriptSale['currency'] : '' }}
                                                            </strong>
                                                         </span>

                                                        @if(isset($descriptSale['old_price']))
                                                            <span class="price_old">
                                                                <del>
                                                                    {{ $descriptSale['old_price'] }}
                                                                    {{ isset($descriptSale['currency']) ? $descriptSale['currency'] : '' }}
                                                                </del>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </span>

                        </div>
                    @endforeach
                </div>
            @endif

            @if(count($productsRecommended) > 0)
                                    <hr/>
                                    <h1 class="slider_titles">Препоръчани продукти</h1>
                <div class="owl-carousel" id="slider_product_recommended">

                    @foreach($productsRecommended as $prRecommended)
                        <?php $descriptRecommended = json_decode($prRecommended->description, true); ?>
                            @if (isset($descriptRecommended['main_picture_url']))
                                <div class="item" style="background-image: url('{{ $descriptRecommended['main_picture_url'] }}');">
                            @elseif(isset($descriptRecommended['upload_main_picture']))
                                <div class="item" style="background-image: url('/storage/upload_pictures/{{ $prRecommended->id }}/{{ $descriptRecommended['upload_main_picture'] }}');">
                            @else
                                <div class="item" style="background-image: url('/storage/common_pictures/noimage.jpg');">
                            @endif

                                    {{ $descriptRecommended['title_product'] }}
                        </div>
                    @endforeach
                </div>
            @endif

            @if(count($productsBestSeller)> 0)
                                    <hr/>
                                    <h1 class="slider_titles">Най - продaвани продукти</h1>
                <div class="owl-carousel" id="slider_best_seller">

                    @foreach($productsBestSeller as $prBestSeller)
                        <?php $descriptBestSeller = json_decode($prBestSeller->description, true); ?>
                        <div class="item">
                            @if (isset($descriptBestSeller['main_picture_url']))
                                <div class="item" style="background-image: url('{{ $descriptBestSeller['main_picture_url'] }}');">
                            @elseif(isset($descriptBestSeller['upload_main_picture']))
                                <div class="item" style="background-image: url('/storage/upload_pictures/{{ $prBestSeller->id }}/{{ $descriptBestSeller['upload_main_picture'] }}');">
                            @else
                                <div class="item" style="background-image: url('/storage/common_pictures/noimage.jpg');">
                            @endif
                                    {{ $descriptBestSeller['title_product'] }}
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script type="text/javascript" src="js/owl.carousel.js"></script>

    <script type="text/javascript">

        $(document).ready(function(){
            $('#slider_product_sale, #slider_product_recommended, #slider_best_seller').owlCarousel({
                autoplay:true,
                autoplayTimeout:2000,
                autoplayHoverPause:true,
                margin: 30,
                items: 5,
                nav: true
            });
        });

    </script>

    <script type="text/javascript" src="js/owl.carousel.js"></script>
@endsection