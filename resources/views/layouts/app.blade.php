<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>

        @if(isset($product))
            @if(isset($metaDescription))

                <meta property="fb:app_id" content="966242223397117" />
                <meta property="og:url" content="{{ Request::fullUrl() }}" />
                <meta property="og:type" content="product" />
                <meta property="og:title" content="Floromaniq - {{isset($metaDescription) ? $metaDescription['title_product'] : '' }}" />
                <meta property="og:description" content="{{isset($metaDescription) ? $metaDescription['title_product'] : '' }}" />
                <meta property="og:image" content="{{ asset('storage/upload_pictures')}}/{{ $product->id }}/{{ isset($metaDescription['upload_main_picture']) ? $metaDescription['upload_main_picture'] : '' }}" />
                <script src="//connect.facebook.net/bg_BG/sdk.js#xfbml=1&version=v2.11"></script>
            @endif
        @endif

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title></title>

        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
            <style>
                canvas {
                    position: fixed;
                    z-index: 0;
                }
            </style>
            <script>

                $(document).ready(function () {
                    var part_url = window.location.pathname.split('/')[1];

                    if (part_url == 'admin') {
                        $("header").css('display', 'none')
                    };
                });
            </script>
            <script src="{{ asset('js/jquery.imgareaselect.js') }}"></script>

    </head>

    <body>
    <!--<canvas></canvas>-->
        <header>
            @include('partials.horizontal_nav_bar')
        </header>

        <div class="wrapper-main-content">
            @yield('content')
        </div>

        <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

        <script>

            var canvas = $('canvas')[0];
            var context = canvas.getContext('2d');

            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;

            var Dots = [];
            var colors = ['#FB4697', '#C0CBD1', '#FD6E88', '#6EC7B6', '#B06FD4'];
            var maximum = 100;

            function Initialize() {
                GenerateDots();

                Update();
            }

            function Dot() {
                this.active = true;

                this.diameter = Math.random() * 8;

                this.x = Math.round(Math.random() * canvas.width);
                this.y = Math.round(Math.random() * canvas.height);

                this.velocity = {
                    x: (Math.random() < 0.5 ? -1 : 1) * Math.random() * 0.7,
                    y: (Math.random() < 0.5 ? -1 : 1) * Math.random() * 0.7
                };

                this.alpha = 0.1;
                this.hex = colors[Math.round(Math.random() * 4)];
                this.color = HexToRGBA(this.hex, this.alpha);
            }

            Dot.prototype = {
                Update: function() {
                    if(this.alpha < 0.8) {
                        this.alpha += 0.01;
                        this.color = HexToRGBA(this.hex, this.alpha);
                    }

                    this.x += this.velocity.x;
                    this.y += this.velocity.y;

                    if(this.x > canvas.width + 5 || this.x < 0 - 5 || this.y > canvas.height + 5 || this.y < 0 - 5) {
                        this.active = false;
                    }
                },

                Draw: function() {
                    context.fillStyle = this.color;
                    context.beginPath();
                    context.arc(this.x, this.y, this.diameter, 0, Math.PI * 2, false);
                    context.fill();
                }
            }

            function Update() {
                GenerateDots();

                Dots.forEach(function(Dot) {
                    Dot.Update();
                });

                Dots = Dots.filter(function(Dot) {
                    return Dot.active;
                });

                Render();
                requestAnimationFrame(Update);
            }

            function Render() {
                context.clearRect(0, 0, canvas.width, canvas.height);
                Dots.forEach(function(Dot) {
                    Dot.Draw();
                });
            }

            function GenerateDots() {
                if(Dots.length < maximum) {
                    for(var i = Dots.length; i < maximum; i++) {
                        Dots.push(new Dot());
                    }
                }

                return false;
            }

            function HexToRGBA(hex, alpha) {
                var red = parseInt((TrimHex(hex)).substring(0, 2), 16);
                var green = parseInt((TrimHex(hex)).substring(2, 4), 16);
                var blue = parseInt((TrimHex(hex)).substring(4, 6), 16);

                return 'rgba(' + red + ', ' + green + ', ' + blue + ', ' + alpha + ')';
            }

            function TrimHex(hex) {
                return (hex.charAt(0) == "#") ? hex.substring(1, 7) : h;
            }

            $(window).resize(function() {
                Dots = [];
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            });

            Initialize();
        </script>
    </body>
</html>
