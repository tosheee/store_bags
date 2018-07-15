@extends('layouts.app')

@section('content')
    <style>
        .container {
            margin-top: 20px;
        }

        #carousel-example-generic.carousel {
            width: 100%;
        }

        /* Carousel Styles */
        .carousel-indicators .active {
            background-color: #2980b9;
        }

        .carousel-inner img {
            width: 100%;
            max-height: 460px
        }

        .carousel-control {
            width: 0;
        }

        .carousel-control.left,
        .carousel-control.right {
            opacity: 1;
            filter: alpha(opacity=100);
            background-image: none;
            background-repeat: no-repeat;
            text-shadow: none;
        }

        .carousel-control.left span {
            padding: 15px;
        }

        .carousel-control.right span {
            padding: 15px;
        }

        .carousel-control .glyphicon-chevron-left,
        .carousel-control .glyphicon-chevron-right,
        .carousel-control .icon-prev,
        .carousel-control .icon-next {
            position: absolute;
            top: 45%;
            z-index: 5;
            display: inline-block;
        }

        .carousel-control .glyphicon-chevron-left,
        .carousel-control .icon-prev {
            left: 0;
        }

        .carousel-control .glyphicon-chevron-right,
        .carousel-control .icon-next {
            right: 0;
        }

        .carousel-control.left span,
        .carousel-control.right span {
            background-color: #000;
        }

        .carousel-control.left span:hover,
        .carousel-control.right span:hover {
            opacity: .7;
            filter: alpha(opacity=70);
        }

        /* Carousel Header Styles */
        .header-text {
            position: absolute;
            top: 20%;
            left: 1.8%;
            right: auto;
            width: 96.66666666666666%;
            color: #fff;
        }

        .header-text h2 {
            font-size: 40px;
        }

        .header-text h2 span {
            background-color: #2980b9;
            padding: 10px;
        }

        .header-text h3 span {
            background-color: #000;
            padding: 15px;
        }

        .btn-min-block {
            min-width: 170px;
            line-height: 26px;
        }

        .btn-theme {
            color: #fff;
            background-color: transparent;
            border: 2px solid #fff;
            margin-right: 15px;
        }

        .btn-theme:hover {
            color: #000;
            background-color: #fff;
            border-color: #fff;
        }

    </style>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <div class="row">
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
        </div>
    </div>

@endsection