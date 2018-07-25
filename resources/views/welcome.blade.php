@extends('layouts.app')

@section('content')
    <style>
        #carousel-example-generic.carousel {
            width: 99%;
            height: 100%;
            margin: 0 auto;

        }

        /* Carousel Styles */
        #carousel-example-generic .carousel-indicators .active {
            background-color: #2980b9;
        }

        #carousel-example-generic .carousel-indicators {
            position: absolute;
            margin: 0 auto;
            top: 5%;
            left: 50%;
            z-index: 15;
            width: 10%;
            height: 20px;
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
            text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
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
            z-index: 5;
            display: inline-block;
        }

        #carousel-example-generic .icon-prev, #carousel-example-generic .icon-next {
            top: 25%;
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
            z-index: 20;
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

        .slider_titles {
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
    @if(isset($allSliderData))
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach($allSliderData as $target_key=>$_)
                    <li data-target="#carousel-example-generic"
                        data-slide-to="{{$target_key}}"  {{ $target_key == 0 ?  'class=active' : ''}}></li>
                @endforeach
            </ol>

            <div class="carousel-inner">
                @foreach($allSliderData as $key=>$slider_data)
                    <div class="{{ $key == 0 ?  'item active' : 'item'}}">
                        <img class="img-responsive" src="/storage/common_pictures/{{$slider_data->slider_img}}">

                        <!-- Static Header -->
                        <div class="header-text hidden-xs">
                            <div class="col-md-12 text-center">
                                <h2><span>{{ $slider_data->title }}</span></h2>
                                <br>

                                <h3><span>{{ $slider_data->description }}</span></h3>

                                <br>

                                <div class="">
                                    <a class="btn btn-theme btn-sm btn-min-block" href="/login">Вход</a>
                                    <a class="btn btn-theme btn-sm btn-min-block" href="/register">Регистрация</a>
                                </div>
                            </div>
                        </div>
                        <!-- /header-text -->

                    </div>
                @endforeach

            </div>


            <!-- Controls -->
            <a class="left carousel-control icon-prev" href="#carousel-example-generic" data-slide="prev"><span
                        class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control icon-next" href="#carousel-example-generic" data-slide="next"><span
                        class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    @else
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
                    <img src="https://cdn.shopify.com/s/files/1/0949/5440/products/IMG_5790EDIT_1024x1024.jpg?v=1480510669"
                         alt="First slide">
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
                                <a class="btn btn-theme btn-sm btn-min-block" href="/login">Вход</a>
                                <a class="btn btn-theme btn-sm btn-min-block" href="/register">Регистрация</a></div>
                        </div>
                    </div>
                    <!-- /header-text -->
                </div>


                <div class="item">
                    <img src="https://hips.hearstapps.com/bpc.h-cdn.co/assets/17/41/1600x800/landscape-1507667726-vegan-bags.jpg?resize=768:*"
                         alt="Second slide">
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
                                <a class="btn btn-theme btn-sm btn-min-block" href="#">Login</a>
                                <a class="btn btn-theme btn-sm btn-min-block" href="#">Register</a>
                            </div>
                        </div>
                    </div>
                    <!-- /header-text -->
                </div>

                <div class="item">
                    <img src="http://uiconstock.com/wp-content/uploads/2015/12/Free-Shopping-Bag-Mockup.jpg"
                         alt="Third slide">
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
                                <a class="btn btn-theme btn-sm btn-min-block" href="/login">Вход</a>
                                <a class="btn btn-theme btn-sm btn-min-block" href="/register">Регистрация</a>
                            </div>
                        </div>
                    </div>
                    <!-- /header-text -->
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"><span
                        class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"><span
                        class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
        <!-- /carousel -->
    @endif


    @include('partials.items_slider')
@endsection