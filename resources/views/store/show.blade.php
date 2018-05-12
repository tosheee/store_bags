@extends('layouts.app')

@section('content')

    <div class="col-md4">
<div class="show-product container">

    <!-- Gallery -->
    <div id="js-gallery" class="gallery">

        <!--Gallery Hero-->
        <div class="gallery__hero">
            <a  class="gallery__hero-enlarge ir" data-gallery="zoom">Zoom</a>

            <img src="https://public-619e3.firebaseapp.com/Product-Gallery/products/normal/product-01_view-01.jpg">
        </div>
        <!--Gallery Hero-->

        <!--Gallery Thumbs-->
        <div class="gallery__thumbs">
            <a href="https://public-619e3.firebaseapp.com/Product-Gallery/products/normal/product-01_view-01.jpg" data-gallery="thumb" class="is-active">
                <img src="https://public-619e3.firebaseapp.com/Product-Gallery/products/thumb/product-01_view-01.jpg">
            </a>
            <a href="https://public-619e3.firebaseapp.com/Product-Gallery/products/normal/product-01_view-02.jpg" data-gallery="thumb">
                <img src="https://public-619e3.firebaseapp.com/Product-Gallery/products/thumb/product-01_view-02.jpg">
            </a>
            <a href="https://public-619e3.firebaseapp.com/Product-Gallery/products/normal/product-01_view-03.jpg" data-gallery="thumb">
                <img src="https://public-619e3.firebaseapp.com/Product-Gallery/products/thumb/product-01_view-03.jpg">
            </a>
        </div>
        <!--Gallery Thumbs-->

    </div><!--.gallery-->
    <!-- Gallery -->

</div><!--.container-->
    </div>
<script>


    var App = (function () {

        //=== Use Strict ===//
        'use strict';

        //=== Private Variables ===//
        var gallery = $('#js-gallery');

        //=== Gallery Object ===//
        var Gallery = {
            zoom: function(imgContainer, img) {
                var containerHeight = imgContainer.outerHeight(),
                        src = img.attr('src');

                if ( src.indexOf('/products/normal/') != -1 ) {
                    // Set height of container
                    imgContainer.css( "height", containerHeight );

                    // Switch hero image src with large version
                    img.attr('src', src.replace('/products/normal/', '/products/zoom/') );

                    // Add zoomed class to gallery container
                    gallery.addClass('is-zoomed');

                    // Enable image to be draggable
                    img.draggable({
                        drag: function( event, ui ) {
                            ui.position.left = Math.min( 100, ui.position.left );
                            ui.position.top = Math.min( 100, ui.position.top );
                        }
                    });
                } else {
                    // Ensure height of container fits image
                    imgContainer.css( "height", "auto" );

                    // Switch hero image src with normal version
                    img.attr('src', src.replace('/products/zoom/', '/products/normal/') );

                    // Remove zoomed class to gallery container
                    gallery.removeClass('is-zoomed');
                }
            },
            switch: function(trigger, imgContainer) {
                var src = trigger.attr('href'),
                        thumbs = trigger.siblings(),
                        img = trigger.parent().prev().children();

                // Add active class to thumb
                trigger.addClass('is-active');

                // Remove active class from thumbs
                thumbs.each(function() {
                    if( $(this).hasClass('is-active') ) {
                        $(this).removeClass('is-active');
                    }
                });

                // Reset container if in zoom state
                if ( gallery.hasClass('is-zoomed') ) {
                    gallery.removeClass('is-zoomed');
                    imgContainer.css( "height", "auto" );
                }

                // Switch image source
                img.attr('src', src);
            }
        };

        //=== Public Methods ===//
        function init() {

            // Listen for clicks on anchors within gallery
            gallery.delegate('a', 'click', function(event) {
                var trigger = $(this);
                var triggerData = trigger.data("gallery");

                if ( triggerData === 'zoom') {
                    var imgContainer = trigger.parent(),
                            img = trigger.siblings();
                    Gallery.zoom(imgContainer, img);
                } else if ( triggerData === 'thumb') {
                    var imgContainer = trigger.parent().siblings();
                    Gallery.switch(trigger, imgContainer);
                } else {
                    return;
                }

                event.preventDefault();
            });

        }

        //=== Make Methods Public ===//
        return {
            init: init
        };

    })();

    App.init();
</script>

@endsection
