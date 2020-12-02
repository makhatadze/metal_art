@extends('frontend.layouts.layout')
@section('content')
    <!-- section 1 - hero -->
    <section id="hero" class="child">

        <div class="hero-top">
            <a href="gallery.html" class="hero-link hero-left">
                <img src="frontend-assets/img/hero-left.jpg" alt="product">
                <div class="overlay"></div>
                <p>ავეჯი</p>
            </a>
            <a href="gallery.html" class="hero-link hero-right">
                <img src="frontend-assets/img/hero-right.png" alt="product">
                <div class="overlay"></div>
                <p>დეკორაციები</p>
            </a>
        </div>

        <div class="hero-body">
            <div class="bg-top"></div>

            <div class="hero-content">
                <a href="gallery.html"  class="vertical-t">
                    ყველა პროდუქცია <img src="frontend-assets/img/logos/triangle.png" alt="">
                </a>

                <h2 class="hero-heading">ჩვენი პროდუქცია</h2>

                <p class="hero-sub-heading">
                    ლორემ იპსუმ მზეო მაკეთებინებენ საზიზღარი, ამოვარდნას მოხმარების არაუშავს მშიშარა იზამ, გამოგვაძევა ბოსელი იმარაგებენ, მათხოვრობის
                </p>

                <div class="hero-slider">

                    <div class="slide-item">
                        <div class="overlay"></div>
                        <img src="frontend-assets/img/1-slide.jpg" alt="slide-i">
                        <div class="hero-hover">
                            <p>პროდუქტის სახელი</p>
                            <a href="details.html" class="hero-item-btn">დეტალურად</a>
                        </div>
                    </div>

                    <div class="slide-item">
                        <div class="overlay"></div>
                        <img src="frontend-assets/img/2-slide.jpg" alt="slide-i">
                        <div class="hero-hover">
                            <p>პროდუქტის სახელი</p>
                            <a href="details.html" class="hero-item-btn">დეტალურად</a>
                        </div>
                    </div>

                    <div class="slide-item">
                        <div class="overlay"></div>
                        <img src="frontend-assets/img/3-slide.jpg" alt="slide-i">
                        <div class="hero-hover">
                            <p>პროდუქტის სახელი</p>
                            <a href="details.html" class="hero-item-btn">დეტალურად</a>
                        </div>
                    </div>

                    <div class="slide-item">
                        <div class="overlay"></div>
                        <img src="frontend-assets/img/4-slide.jpg" alt="slide-i">
                        <div class="hero-hover">
                            <p>პროდუქტის სახელი</p>
                            <a href="details.html" class="hero-item-btn">დეტალურად</a>
                        </div>
                    </div>

                    <div class="slide-item">
                        <div class="overlay"></div>
                        <img src="frontend-assets/img/1-slide.jpg" alt="slide-i">
                        <div class="hero-hover">
                            <p>პროდუქტის სახელი</p>
                            <a href="details.html" class="hero-item-btn">დეტალურად</a>
                        </div>
                    </div>

                    <div class="slide-item">
                        <div class="overlay"></div>
                        <img src="frontend-assets/img/2-slide.jpg" alt="slide-i">
                        <div class="hero-hover">
                            <p>პროდუქტის სახელი</p>
                            <a href="details.html" class="hero-item-btn">დეტალურად</a>
                        </div>
                    </div>

                    <div class="slide-item">
                        <div class="overlay"></div>
                        <img src="frontend-assets/img/3-slide.jpg" alt="slide-i">
                        <div class="hero-hover">
                            <p>პროდუქტის სახელი</p>
                            <a href="details.html" class="hero-item-btn">დეტალურად</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <!-- section 2 - product of day -->
    <section id="day-product">
        <div class="overlay-left"></div>
        <div class="overlay-right"></div>

        <div class="day-product-wrap">
            <div class="day-p-left">
                <img src="frontend-assets/img/hero-right.png" alt="">
            </div>
            <div class="day-product-content">
                <div class="day-product-info">
                    <h3 class="day-p-title">დღის პროდუქტი</h3>
                    <h2 class="day-p-name">პროდუქტის სახელი</h2>
                    <p class="day-p-text">ლორემ იფსუმ დოლორ სით ამეთ, დოლორე ნონუმy ვოლუფთათუმ ვიმ თე. ად მოდუს ნომინავი აცცომმოდარე ყუო. ეოს ინ ინცორრუფთე სცრიბენთურ.
                    </p>

                    <a href="details.html" class="day-p-link">დეტალურად</a>

                </div>
                <div class="day-product-img">
                    <img src="frontend-assets/img/day-product.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- section 3 - hello - about us -->
    <section id="video" class="child">
        <div class="half-side">
            <div class="video-container">

                <div class="video-box">
                    <img class="cover-img" src="frontend-assets/img/video-p.png" alt="">
                    <div class="video-text">
                        <p class="p-top">შექმნის</p>
                        <p class="p-bot">პრო<span class="white-t">ცესი</span></p>
                    </div>

                    <div class="overl"></div>

                    <button class="video-btn">
                        <img class="play" src="frontend-assets/img/logos/play-icon.png" alt="">
                        <div class="v-btn-t">
                            უყურე <br> ვიდეოს
                        </div>
                    </button>

                </div>
            </div>

        </div>

        <div class="half-side">
            <div class="hello-container">
                <h1 class="hello-heading">
                    გამარჯობა!
                </h1>
                <p class="hello-p">
                    ლორემ იფსუმ დოლორ სით ამეთ,ვოლუფთათუმ ვიმ. ად მოდუს ნომინავი აცცომმოდარე ყუო. ეოს ინ ინცორრუფთე სცრიბენთურ.

                </p>

                <div class="about-btn-w">
                    <a class="hello-about-btn">
                        ჩვენს შესახებ
                    </a>
                </div>
            </div>
        </div>

    </section>

    <!-- Video Modal-->
    <section id="video-modal">
        <button class="video-close-btn" >
            <img src="frontend-assets/img/logos/Icon metro-cancel.png" alt="">
        </button>

        <div class="video-wrap">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/yAoLSRbwxL8" frameborder="0"  allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>

    </section>

    <!-- About us modal -->
    <section id="about-modal">

        <button class="close-btn">
            <img src="frontend-assets/img/logos/Icon metro-cancel.png" alt="">
        </button>

        <div class="modal-wrap">

            <h1 class="modal-heading">ჩვენს შესახებ</h1>
            <p class="modal-p">
                ლორემ იფსუმ დოლორ სით ამეთ,ვოლუფთათუმ ვიმ. ად მოდუს ნომინავი აცცომმოდარე ყუო. ეოს ინ ინცორრუფთე სცრიბენთურ, ემ იფსუმ დოლორ სით ამეთ,ვოლუფთათუმ ვიმ. ად მოდუს ნომინავი აცცომმოდარე ყუო. ეოს ინ ინცორრუფთე სცრიბენთურ, ლორე
                სუმ დოლორ სით ამეთ,ვოლუფთათუმ ვიმ. ად მოდუს ნომინავი აცცომმოდარე ყუო. ეოს ინ ინცორრუფთე სცრიბენთურ, ლორემ მ იფსუმ დოლორ სით ამეთ,ვოლუფთათუმ ვიმ. ად მოდუს ნომინავი აცცომმოდარე ყუო. ეოს ინ ინცორრუფთე სცრიბენთურ.

            </p>

            <div class="modal-btns">
                <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d95278.13240907624!2d44.768813263292024!3d41.73256609181533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40440cd7e64f626b%3A0x61d084ede2576ea3!2sTbilisi!5e0!3m2!1sen!2sge!4v1597843332216!5m2!1sen!2sge" target="_blank">

                    <svg xmlns="http://www.w3.org/2000/svg" width="20.588" height="24.719" viewBox="0 0 20.588 24.719">
                        <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin" transform="translate(-3.5 -0.5)">
                            <path id="Path_40" data-name="Path 40" d="M23.088,10.794c0,7.229-9.294,13.425-9.294,13.425S4.5,18.023,4.5,10.794a9.294,9.294,0,1,1,18.588,0Z" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                            <path id="Path_41" data-name="Path 41" d="M19.7,13.6a3.1,3.1,0,1,1-3.1-3.1A3.1,3.1,0,0,1,19.7,13.6Z" transform="translate(-2.804 -2.804)" fill="none"  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        </g>
                    </svg>

                    თბილისი ქუჩა N31
                </a>
                <a href="tel:+995555555555">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24.421" height="24.464" viewBox="0 0 24.421 24.464">
                        <path id="Icon_feather-phone-call" data-name="Icon feather-phone-call" d="M16.99,5.773a5.341,5.341,0,0,1,4.22,4.22M16.99,1.5a9.615,9.615,0,0,1,8.493,8.482m-1.068,8.525v3.2a2.137,2.137,0,0,1-2.329,2.137,21.141,21.141,0,0,1-9.219-3.28,20.832,20.832,0,0,1-6.41-6.41A21.141,21.141,0,0,1,3.176,4.9,2.137,2.137,0,0,1,5.3,2.568h3.2a2.137,2.137,0,0,1,2.137,1.837,13.717,13.717,0,0,0,.748,3,2.137,2.137,0,0,1-.481,2.254L9.554,11.018a17.093,17.093,0,0,0,6.41,6.41l1.357-1.357a2.137,2.137,0,0,1,2.254-.481,13.717,13.717,0,0,0,3,.748A2.137,2.137,0,0,1,24.414,18.507Z" transform="translate(-2.167 -0.396)" fill="none"  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </svg>

                    +995 555 555 555
                </a>
            </div>
        </div>
    </section>

@endsection

