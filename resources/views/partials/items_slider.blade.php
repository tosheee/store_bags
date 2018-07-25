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
                            <div class="item"
                                 style="background-image: url('/storage/upload_pictures/{{ $prSale->id }}/{{ $descriptSale['upload_main_picture'] }}');">
                                @else
                                    <div class="item"
                                         style="background-image: url('/storage/common_pictures/noimage.jpg');">
                                        @endif

                                        <span class="owl-item-title">
                                <a href="/store/{{ $prSale->id }}/">{{ $descriptSale['title_product'] }}</a>
                             </span>

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
                                        <div class="item"
                                             style="background-image: url('{{ $descriptRecommended['main_picture_url'] }}');">
                                            @elseif(isset($descriptRecommended['upload_main_picture']))
                                                <div class="item"
                                                     style="background-image: url('/storage/upload_pictures/{{ $prRecommended->id }}/{{ $descriptRecommended['upload_main_picture'] }}');">
                                                    @else
                                                        <div class="item"
                                                             style="background-image: url('/storage/common_pictures/noimage.jpg');">
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
                                                                <div class="item"
                                                                     style="background-image: url('{{ $descriptBestSeller['main_picture_url'] }}');">
                                                                    @elseif(isset($descriptBestSeller['upload_main_picture']))
                                                                        <div class="item"
                                                                             style="background-image: url('/storage/upload_pictures/{{ $prBestSeller->id }}/{{ $descriptBestSeller['upload_main_picture'] }}');">
                                                                            @else
                                                                                <div class="item"
                                                                                     style="background-image: url('/storage/common_pictures/noimage.jpg');">
                                                                                    @endif
                                                                                    {{ $descriptBestSeller['title_product'] }}
                                                                                </div>
                                                                                @endforeach
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                        </div>


                                                        <script type="text/javascript"
                                                                src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                                                        <script type="text/javascript"
                                                                src="js/owl.carousel.js"></script>

                                                        <script type="text/javascript">
                                                            $(document).ready(function () {
                                                                $('#slider_product_sale, #slider_product_recommended, #slider_best_seller').owlCarousel({
                                                                    autoplay: true,
                                                                    autoplayTimeout: 2000,
                                                                    autoplayHoverPause: true,
                                                                    margin: 30,
                                                                    items: 5,
                                                                    nav: true
                                                                });
                                                            });
                                                        </script>

                                                        <script type="text/javascript"
                                                                src="js/owl.carousel.js"></script>