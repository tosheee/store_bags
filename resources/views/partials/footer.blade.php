    <footer id="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h4 class="title">The Bag</h4>
                    <p>
                        The Bag.bg предлага оригинални, модерни чанти и маркови портфейли на известни марки в света на модата.
                        Тук ще откриете любимия аксесоар и ще бъде незаменима част от вашата визия.
                        С продуктите ни ще бъдете винаги елегантни и актуални според всеки сезон, те са изработени от естествена и еко кожа с гарантирано качество.
                    </p>

                    <ul class="social-icon">
                        <a href="#" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" class="social"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" class="social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#" class="social"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        <a href="#" class="social"><i class="fa fa-google" aria-hidden="true"></i></a>
                        <a href="#" class="social"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                    </ul>
                </div>

                <div class="col-sm-3">
                    <h4 class="title">Контакти</h4>
                    <span class="acount-icon">
                        <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Wish List</a>
                        <a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i> Cart</a>
                        <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
                        <a href="#"><i class="fa fa-globe" aria-hidden="true"></i> Language</a>
                    </span>
                </div>

                <div class="col-sm-3">
                    <h4 class="title">Категории</h4>
                    <div class="category">
                        @foreach($categoriesButtonsName as $categoryButton)
                            <a href="/store/search?category={{ $categoryButton->id }}" title="{{ $categoryButton->name }}">
                                {{ $categoryButton->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="col-sm-3">
                    <h4 class="title">Payment Methods</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <ul class="payment">
                        <li><a href="#"><i class="fa fa-cc-amex" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-paypal" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-visa" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <hr>

            <div class="row text-center"> © 2018 by Todor Chakarov.</div>
        </div>
    </footer>