@extends('frontend.layouts.layout')
@section('content')
@include('frontend.layouts.partials.detail-header')
@include('frontend.layouts.partials.modal')
<!-- sell car Modal -->


    <!-- section 1 -   slider -->
    <section id="details-slider__section">

        <div class="details-slider">
            @foreach($images as $img)
                <div class="details-slider__item">
                    <img  src="{{url('storage/product/'.$product->id.'/'.$img->name)}}" alt="">
                    <div class="slider-overlay"></div>
                </div>

            @endforeach
        </div>

    </section>

    <!-- section 2 - main -->
    <section id="details-section">
        <div class="container">

            <div class="details-section__main">

                <div class="details-section__main-top">

                    <div class="car-brand-icon">
                        <img src="{{url('frontend-assets/img/logos/BMW.svg')}}" alt="">
                    </div>

                    <div class="details__car-info">
                        <h2 class="details__car-price">
                            {{number_format($product->price, 2)}} ლ
                        </h2>
                        <h1 class="details__car-name">
                            {{$product->title_ge}}
                        </h1>
                        <div class="details__car-additational">
                            <p>#<span class="car-id">{{$product->id}}</span></p>
                        </div>
                    </div>
                </div>

                <div class="details-section__main-description">
                    <h2 class="description__heading">
                        აღწერა
                    </h2>
                    <p class="description__p">
                        {{ $product->description_ge }}

                    </p>

                    <div class="description__grid">
                        <p class="description__element">
                            <img src="{{url('frontend-assets/img/logos/car-b.png')}}" alt="">
                            ბრენდი, მოდელი:
                            <span>{{$brand->title}}, {{$model->title}}</span>
                        </p>

                        <p class="description__element">
                            <img src="{{url('frontend-assets/img/logos/data-i-b.png')}}" alt="">
                            დამატების თარიღი:
                            <span>20 ივნ, 2020</span>
                        </p>

                        <p class="description__element">
                            <img src="{{url('frontend-assets/img/logos/price-i.png')}}" alt="">
                            ფასი:
                            <span>{{number_format($product->price, 2)}} ლ</span>
                        </p>

                        <p class="description__element">
                            <img src="{{url('frontend-assets/img/logos/i-car-dealer.png')}}" alt="">
                            გარიგების ტიპი:
                            <span>{{$deal->title_ge}}</span>
                        </p>

                        <p class="description__element">
                            <img src="{{url('frontend-assets/img/logos/b-car-crash.png')}}" alt="">
                            მდგომარეობა:
                            <span>{{$product->new ? 'ახალი' : 'მეორადი'}}</span>
                        </p>

                        <p class="description__element">
                            <img src="{{url('frontend-assets/img/logos/data-i-b.png')}}" alt="">
                            გამოშვების თარიღი:
                            <span>{{ date('Y', strtotime($product->created_date))}}</span>
                        </p>

                        <p class="description__element">
                            <img src="{{url('frontend-assets/img/logos/engine-i.png')}}" alt="">
                            ძრავის ტიპი:
                            <span>{{$engine->title_ge}}</span>
                        </p>

                        <p class="description__element">
                            <img src="{{url('frontend-assets/img/logos/b-speedometer.png')}}" alt="">
                            ძრავის მოცულობა:
                            <span>{{$product->engine_capacity}}</span>
                        </p>
                    </div>
                </div>

                @include('frontend.form')

            </div>

            <aside class="details-section__aside">

                <button class="details-section__callus">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17.773" height="17.773" viewBox="0 0 17.773 17.773">
                        <path id="Icon_material-call" data-name="Icon material-call" d="M8.074,12.192A14.957,14.957,0,0,0,14.581,18.7l2.172-2.172a.982.982,0,0,1,1.007-.237,11.263,11.263,0,0,0,3.525.563.99.99,0,0,1,.987.987v3.446a.99.99,0,0,1-.987.987A16.784,16.784,0,0,1,4.5,5.487.99.99,0,0,1,5.487,4.5H8.943a.99.99,0,0,1,.987.987,11.217,11.217,0,0,0,.563,3.525.991.991,0,0,1-.247,1.007L8.074,12.192Z" transform="translate(-4.5 -4.5)" />
                    </svg>
                    დაგვიკავშირდით
                </button>

                <div class="adide__ad-top">
                    <img class="img-cover" src="{{url('frontend-assets/img/details-ad-bot.png')}}" alt="">
                </div>
                <div class="adide__ad-bottom">
                    <img class="img-cover" src="{{url('frontend-assets/img/details-ad-bot.png')}}" alt="">
                </div>
            </aside>
        </div>
    </section>


    <!-- section 3 - map -->
    <section id="details-map">
        <div class="container">

            <div class="details-map-box">

                <div class="overlay-map"></div>
                <iframe width="100%" height="200px"  src="https://maps.google.com/maps?q=tbilisi&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>

        </div>
    </section>

    <!-- section 4 - might like -->
    <section id="u-might-like">

        <div class="container">

            <h2 class="u-might-like__heading">
                შეიძლება მოგეწონოთ
            </h2>

            <div class="u-might-like__wrapper">

                <div class="card">

                    <div class="card-img-box">
                        <img src="./img/vip-car-3.png" alt="">
                    </div>

                    <div class="card__main">

                        <div class="card__top">
                            <h2 id="c-name">Toyota Yaris</h2>
                            <span id="c-year">2013</span>

                            <div class="currency" id="adviced1">
                                <button class="select-gel active" onclick="changecurrency('adviced1', 'gel')">₾</button>
                                <button class="select-dol" onclick="changecurrency('adviced1', 'dol')">$</button>
                            </div>
                        </div>

                        <div class="card__middle">
                            <div class="card__middle-top">
                                <span>ფასი</span>
                                <span>კატეგორია</span>
                            </div>
                            <div class="card__middle-body">
                                <p id="c-price">6,000₾</p>
                                <p class="c-category">მეორადი / ავტომატიკა / სპორტული</p>
                            </div>
                        </div>

                        <div class="card__more-info">

                            <div class="card__more-info-block">
                                <div class="card__more-info__label">
                                    <img src="./img/logos/i-road.svg" alt="">
                                    გარბენი:
                                </div>
                                <p>გარბენი უცნობია</p>
                            </div>

                            <div class="card__more-info-block">
                                <div class="card__more-info__label">
                                    <img src="./img/logos/i-car-crash.svg" alt="">
                                    დაზიანება:
                                </div>
                                <p>არ აქვს</p>
                            </div>

                            <div class="card__more-info-block">
                                <div class="card__more-info__label">
                                    <img src="./img/logos/gray-car-i.svg" alt="">
                                    მდგომარეობა:
                                </div>
                                <p>იქოქება და დადის</p>
                            </div>

                            <div class="card__more-info-block">
                                <div class="card__more-info__label">
                                    <img src="./img/logos/i-dollar-sign.svg" alt="">
                                    გაყიდვის ტიპი:
                                </div>
                                <p>განვადება, ხელზე</p>
                            </div>

                        </div>
                    </div>

                    <div class="card__bottom">
                        <div class="card__bottom-views">
                            <img src="./img/logos/i-fire.svg" alt="">
                            2 ადამიანი ნახულობს
                        </div>

                        <a href="details.html" class="card__bottom-btn">
                            დეტალურად
                        </a>
                    </div>

                </div>

                <div class="card">

                    <div class="card-img-box">
                        <img src="./img/vip-car-1.png" alt="">
                    </div>

                    <div class="card__main">

                        <div class="card__top">
                            <h2 id="c-name">Toyota Yaris</h2>
                            <span id="c-year">2013</span>

                            <div class="currency" id="adviced2">
                                <button class="select-gel active" onclick="changecurrency('adviced2', 'gel')">₾</button>
                                <button class="select-dol" onclick="changecurrency('adviced2', 'dol')">$</button>
                            </div>
                        </div>

                        <div class="card__middle">
                            <div class="card__middle-top">
                                <span>ფასი</span>
                                <span>კატეგორია</span>
                            </div>
                            <div class="card__middle-body">
                                <p id="c-price">6,000₾</p>
                                <p class="c-category">მეორადი / ავტომატიკა / სპორტული</p>
                            </div>
                        </div>

                        <div class="card__more-info">

                            <div class="card__more-info-block">
                                <div class="card__more-info__label">
                                    <img src="./img/logos/i-road.svg" alt="">
                                    გარბენი:
                                </div>
                                <p>გარბენი უცნობია</p>
                            </div>

                            <div class="card__more-info-block">
                                <div class="card__more-info__label">
                                    <img src="./img/logos/i-car-crash.svg" alt="">
                                    დაზიანება:
                                </div>
                                <p>არ აქვს</p>
                            </div>

                            <div class="card__more-info-block">
                                <div class="card__more-info__label">
                                    <img src="./img/logos/gray-car-i.svg" alt="">
                                    მდგომარეობა:
                                </div>
                                <p>იქოქება და დადის</p>
                            </div>

                            <div class="card__more-info-block">
                                <div class="card__more-info__label">
                                    <img src="./img/logos/i-dollar-sign.svg" alt="">
                                    გაყიდვის ტიპი:
                                </div>
                                <p>განვადება, ხელზე</p>
                            </div>

                        </div>
                    </div>

                    <div class="card__bottom">
                        <div class="card__bottom-views">
                            <img src="./img/logos/i-fire.svg" alt="">
                            2 ადამიანი ნახულობს
                        </div>

                        <a href="details.html" class="card__bottom-btn">
                            დეტალურად
                        </a>
                    </div>

                </div>

                <div class="card">

                    <div class="card-img-box">
                        <img src="./img/vip-car-4.png" alt="">
                    </div>

                    <div class="card__main">

                        <div class="card__top">
                            <h2 id="c-name">Toyota Yaris</h2>
                            <span id="c-year">2013</span>

                            <div class="currency" id="adviced3">
                                <button class="select-gel active" onclick="changecurrency('adviced3', 'gel')">₾</button>
                                <button class="select-dol" onclick="changecurrency('adviced3', 'dol')">$</button>
                            </div>
                        </div>

                        <div class="card__middle">
                            <div class="card__middle-top">
                                <span>ფასი</span>
                                <span>კატეგორია</span>
                            </div>
                            <div class="card__middle-body">
                                <p id="c-price">6,000₾</p>
                                <p class="c-category">მეორადი / ავტომატიკა / სპორტული</p>
                            </div>
                        </div>

                        <div class="card__more-info">

                            <div class="card__more-info-block">
                                <div class="card__more-info__label">
                                    <img src="./img/logos/i-road.svg" alt="">
                                    გარბენი:
                                </div>
                                <p>გარბენი უცნობია</p>
                            </div>

                            <div class="card__more-info-block">
                                <div class="card__more-info__label">
                                    <img src="./img/logos/i-car-crash.svg" alt="">
                                    დაზიანება:
                                </div>
                                <p>არ აქვს</p>
                            </div>

                            <div class="card__more-info-block">
                                <div class="card__more-info__label">
                                    <img src="./img/logos/gray-car-i.svg" alt="">
                                    მდგომარეობა:
                                </div>
                                <p>იქოქება და დადის</p>
                            </div>

                            <div class="card__more-info-block">
                                <div class="card__more-info__label">
                                    <img src="./img/logos/i-dollar-sign.svg" alt="">
                                    გაყიდვის ტიპი:
                                </div>
                                <p>განვადება, ხელზე</p>
                            </div>

                        </div>
                    </div>

                    <div class="card__bottom">
                        <div class="card__bottom-views">
                            <img src="./img/logos/i-fire.svg" alt="">
                            2 ადამიანი ნახულობს
                        </div>

                        <a href="details.html" class="card__bottom-btn">
                            დეტალურად
                        </a>
                    </div>

                </div>

                <div class="card">

                    <div class="card-img-box">
                        <img src="./img/vip-car-2.png" alt="">
                    </div>

                    <div class="card__main">

                        <div class="card__top">
                            <h2 id="c-name">Toyota Yaris</h2>
                            <span id="c-year">2013</span>

                            <div class="currency" id="adviced4">
                                <button class="select-gel active" onclick="changecurrency('adviced4', 'gel')">₾</button>
                                <button class="select-dol" onclick="changecurrency('adviced4', 'dol')">$</button>
                            </div>
                        </div>

                        <div class="card__middle">
                            <div class="card__middle-top">
                                <span>ფასი</span>
                                <span>კატეგორია</span>
                            </div>
                            <div class="card__middle-body">
                                <p id="c-price">6,000₾</p>
                                <p class="c-category">მეორადი / ავტომატიკა / სპორტული</p>
                            </div>
                        </div>

                        <div class="card__more-info">

                            <div class="card__more-info-block">
                                <div class="card__more-info__label">
                                    <img src="./img/logos/i-road.svg" alt="">
                                    გარბენი:
                                </div>
                                <p>გარბენი უცნობია</p>
                            </div>

                            <div class="card__more-info-block">
                                <div class="card__more-info__label">
                                    <img src="./img/logos/i-car-crash.svg" alt="">
                                    დაზიანება:
                                </div>
                                <p>არ აქვს</p>
                            </div>

                            <div class="card__more-info-block">
                                <div class="card__more-info__label">
                                    <img src="./img/logos/gray-car-i.svg" alt="">
                                    მდგომარეობა:
                                </div>
                                <p>იქოქება და დადის</p>
                            </div>

                            <div class="card__more-info-block">
                                <div class="card__more-info__label">
                                    <img src="./img/logos/i-dollar-sign.svg" alt="">
                                    გაყიდვის ტიპი:
                                </div>
                                <p>განვადება, ხელზე</p>
                            </div>

                        </div>
                    </div>

                    <div class="card__bottom">
                        <div class="card__bottom-views">
                            <img src="./img/logos/i-fire.svg" alt="">
                            2 ადამიანი ნახულობს
                        </div>

                        <a href="details.html" class="card__bottom-btn">
                            დეტალურად
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- section 5 - ad full -->
    <section id="details-banner">
        <div class="container">
            <a class="details-banner__img-box">
                <img src="{{url('frontend-assets/img/baner-full.png')}}" alt="">
            </a>
        </div>
    </section>

    <!-- section 6 - newly added -->
    <section id="newly-added">

        <div class="container">

            <h2 class="newly-added__heading">
                ბოლოს დამატებული
            </h2>

            <div class="newly-added__wrapper">
                @foreach($news as $new)
                    <div class="card">

                        <div class="card-img-box">
                            <img src="{{url('storage/product/'.$new->id.'/'.$new->image()->get()[0]->name)}}" alt="">
                        </div>

                        <div class="card__main">

                            <div class="card__top">
                                <h2 id="c-name">{{$new->title_ge}}</h2>
                                <span id="c-year">{{ date('Y', strtotime($new->created_date))}}</span>

                                <div class="currency" id="newly1">
                                    <button class="select-gel active" onclick="changecurrency('newly1', 'gel')">₾</button>
                                    <button class="select-dol" onclick="changecurrency('newly1', 'dol')">$</button>
                                </div>
                            </div>

                            <div class="card__middle">
                                <div class="card__middle-top">
                                    <span>ფასი</span>
                                    <span>კატეგორია</span>
                                </div>
                                <div class="card__middle-body">
                                    <p id="c-price">{{number_format($product->price, 2)}} ლ</p>
                                    <p class="c-category">{{$new->new ? 'ახალი' : 'მეორადი'}}
                                        / {{$new->transmission->title_ge}}
                                        / {{$new->category->title_ge}}</p>
                                </div>
                            </div>

                            <div class="card__more-info">

                                <div class="card__more-info-block">
                                    <div class="card__more-info__label">
                                        <img src="{{url('frontend-assets/img/logos/i-road.svg')}}" alt="">
                                        გარბენი:
                                    </div>
                                    <p>{{$new->mileage}}</p>
                                </div>

                                <div class="card__more-info-block">
                                    <div class="card__more-info__label">
                                        <img src="{{url('frontend-assets/img/logos/i-car-crash.svg')}}" alt="">
                                        დაზიანება:
                                    </div>
                                    <p>{{$new->new ? 'ახალი' : 'მეორადი'}}</p>
                                </div>

                                <div class="card__more-info-block">
                                    <div class="card__more-info__label">
                                        <img src="{{url('frontend-assets/img/logos/gray-car-i.svg')}}" alt="">
                                        მდგომარეობა:
                                    </div>
                                    <p>{{$new->condition->title_ge}}</p>
                                </div>

                                <div class="card__more-info-block">
                                    <div class="card__more-info__label">
                                        <img src="{{url('frontend-assets/img/logos/i-dollar-sign.svg')}}" alt="">
                                        გაყიდვის ტიპი:
                                    </div>
                                    <p>{{$new->deal->title_ge}}</p>
                                </div>

                            </div>
                        </div>

                        <div class="card__bottom">
                            <div class="card__bottom-views">
                                <img src="{{url('frontend-assets/img/logos/i-fire.svg')}}" alt="">
                                2 ადამიანი ნახულობს
                            </div>

                            <a href="{{route('catalogView',$new->id)}}" class="card__bottom-btn">
                                დეტალურად
                            </a>
                        </div>

                    </div>

                @endforeach
            </div>

        </div>
    </section>


@endsection
@section('custom-scripts')
    <script src="{{url('frontend-assets/script/details.js')}}"></script>
@endsection