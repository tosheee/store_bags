@extends('layouts.app')

@section('content')

    <?php $descriptions = json_decode($product->description, true); ?>
    <br>
    <br>

    <ul>
        <li>
            <div class="order-breadcrumb">
                <a href="/" class="">Начало</a>
                @foreach($categories as $category)
                    @if($product->category_id == $category->id)
                        › <a href="/store/search?category={{ $category->id }}" class=""> {{ $category->name }}</a>
                    @endif
                @endforeach

                @foreach($subCategories as $subCategory)
                    @if($product->sub_category_id == $subCategory->id)
                        › <a href="/store/search?sub_category={{ $subCategory->identifier }}" class="active">{{ $subCategory->name }}</a>
                    @endif
                @endforeach
            </div>
        </li>
    </ul>

    <hr>


    <div class="col-md-5">
        <div class="container-fluid">

            <div class="product-slider" id="product-slider-id">
                <div id="carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            @if (isset($descriptions['main_picture_url']))
                                <img width="40" height="40" src="{{ $descriptions['main_picture_url'] }}" alt="pic" />
                            @elseif(isset($descriptions['upload_main_picture']))
                                <img width="40" height="40" src="/storage/upload_pictures/{{ $product->id }}/{{ $descriptions['upload_main_picture'] }}" alt="pic" />
                            @else
                                <img width="40" height="40" src="/storage/common_pictures/noimage.jpg" alt="pic" />
                            @endif
                        </div>

                        @if (isset($descriptions['gallery']))
                            @foreach( $descriptions['gallery'] as $key => $type_pictures)
                                @foreach($type_pictures as $key_picture => $picture)
                                    <div class="item">
                                        @if($key_picture == 'upload_picture')
                                            <img width="40" height="40" src="/storage/upload_pictures/{{ $product->id }}/{{ $type_pictures[$key_picture] }}" class="img-responsive">
                                        @else
                                            <img width="40" height="40" src="{{ $type_pictures[$key_picture] }}" class="img-responsive">
                                        @endif
                                    </div>
                                @endforeach
                            @endforeach
                        @endif
                    </div>
                </div>


                <div class="clearfix">
                    <div id="thumbcarousel" class="carousel slide" data-interval="false">
                        <div class="carousel-inner">
                            <div class="item active">

                                <div data-target="#carousel" data-slide-to="0" class="thumb">
                                    @if (isset($descriptions['main_picture_url']))
                                        <img width="40" height="40" src="{{ $descriptions['main_picture_url'] }}" alt="pic" />
                                    @else
                                        <img width="40" height="40" src="/storage/upload_pictures/{{ $product->id }}/{{ $descriptions['upload_main_picture'] }}" alt="pic" />
                                    @endif
                                </div>

                                @if (isset($descriptions['gallery']))
                                    @foreach( $descriptions['gallery'] as $key => $type_pictures)
                                        @foreach($type_pictures as $key_picture => $picture)
                                            <div data-target="#carousel" data-slide-to="{{ $key+1 }}" class="thumb">
                                                @if($key_picture == 'upload_picture')
                                                    <img width="40" height="40" src="/storage/upload_pictures/{{ $product->id }}/{{ $type_pictures[$key_picture] }}" class="img-responsive">
                                                @else
                                                    <img width="40" height="40" src="{{ $type_pictures[$key_picture] }}" class="img-responsive">
                                                @endif
                                            </div>
                                        @endforeach
                                    @endforeach
                                @endif

                            </div>
                        </div>
                        <!-- /carousel-inner -->
                        <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> </a> <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i> </a> </div>
                    <!-- /thumbcarousel -->
                </div>
            </div>
        </div>
    </div>

    <div class="com-md-5">

    </div>
@endsection
