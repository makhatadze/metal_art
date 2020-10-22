@extends('frontend.layouts.layout')
@section('content')
    @include('frontend.layouts.partials.detail-header')
    @include('frontend.layouts.partials.modal')
    <!-- sell car Modal -->


    <!-- end of  animation on subbmit request -->
    <!-- section 1 -   slider -->
    <section id="details-slider__section">

        <div class="details-slider">
            @if(count($images) > 0)
                @foreach($images as $img)
                    <div class="details-slider__item">
                        <img src="{{url('storage/product/'.$product->id.'/'.$img->name)}}" alt="">
                        <div class="slider-overlay"></div>
                    </div>

                @endforeach
            @else
                <img src="{{url('noimageavailable.png')}}">
            @endif

        </div>

    </section>
    <!-- section 2 - main -->
    <section id="details-section">
        <div class="container">

            <div class="details-section__main">

                <div class="details-section__main-top">

                    <div class="car-brand-icon">
                        @if(!$product->brand->hasImage())
                            <img src="{{url('noimageavailable.png')}}">
                        @else
                            <img src="{{ $product->brand->image() ? url('storage/brand/'.$product->brand->id.'/'.$product->brand->image()->get()[0]->name) : ''}}" alt="">
                        @endif
                    </div>

                    <div class="details__car-info">
                        <h2 class="details__car-price">
                            {{number_format($product->price, 0)}}
                        </h2>
                        <h1 class="details__car-name">
                            {{$product->{"title_".app()->getLocale()} }}
                        </h1>
                        <div class="details__car-additational">
                            <p>#<span class="car-id">{{$product->id}}</span></p>
                        </div>
                    </div>
                </div>

                <div class="details-section__main-description">
                    <h2 class="description__heading">
                        {{__('app.description')}}
                    </h2>
                    <p class="description__p">
                        {{$product->{"description_".app()->getLocale()} ? $product->{"description_".app()->getLocale()} : $product->description_ge }}

                    </p>

                    <div class="description__grid">
                        <p class="description__element">
                            <img src="{{url('frontend-assets/img/logos/car-b.png')}}" alt="">
                            {{__('app.Manufacturer')}}, {{__('app.model')}}:
                            <span>{{$brand->title}}, {{$model->title}}</span>
                        </p>

                        <p class="description__element">
                            <img src="{{url('frontend-assets/img/logos/data-i-b.png')}}" alt="">
                            {{__('app.date_of_addition')}}:
                            <span>{{ date('Y/m/d', strtotime($product->created_at))}}</span>
                        </p>

                        <p class="description__element">
                            <img src="{{url('frontend-assets/img/logos/price-i.png')}}" alt="">
                            {{__('app.price')}}:
                            <span>{{number_format($product->price, 0)}} $</span>
                        </p>

                        <p class="description__element">
                            <img src="{{url('frontend-assets/img/logos/i-car-dealer.png')}}" alt="">
                            {{__('app.deal_type')}}:
                            <span>{{$deal->{"title_".app()->getLocale()} }}</span>
                        </p>

                        <p class="description__element">
                            <img src="{{url('frontend-assets/img/logos/phone-call.png')}}" alt="">
                            {{__('app.mobile_phone')}}:
                            <span>{{$product->phone}}</span>
                        </p>

                        <p class="description__element">
                            <img src="{{url('frontend-assets/img/logos/data-i-b.png')}}" alt="">
                            {{__('app.release_date')}}:
                            <span>{{ date('Y', strtotime($product->created_date))}}</span>
                        </p>

                        <p class="description__element">
                            <img src="{{url('frontend-assets/img/logos/engine-i.png')}}" alt="">
                            {{__('app.fuel_type')}}:
                            <span>{{$fuel->{"title_".app()->getLocale()} }}</span>
                        </p>

                        <p class="description__element">
                            <img src="{{url('frontend-assets/img/logos/repair.png')}}" alt="">
                            {{__('app.engine_capacity')}}:
                            <span>{{$product->engine_capacity}}</span>
                        </p>

                        <p class="description__element">
                            <img src="{{url('frontend-assets/img/logos/automatic-transmission.png')}}" alt="">
                            {{__('app.transmission')}}:
                            <span>{{$product->transmission->{"title_".app()->getLocale()} }}</span>
                        </p>

                        <p class="description__element">
                            <img src="{{url('frontend-assets/img/logos/b-speedometer.png')}}" alt="">
                            {{__('app.mileage')}}:
                            <span>{{$product->mileage }}</span>
                        </p>

                        <p class="description__element">
                            <img src="{{url('frontend-assets/img/logos/tire.png')}}" alt="">
                            {{__('app.drive')}}:
                            <span>{{$product->drive }}</span>
                        </p>

                        <p class="description__element">
                            <img src="{{url('frontend-assets/img/logos/steering-wheel.png')}}" alt="">
                            {{__('app.wheel')}}:
                            <span>{{$product->wheel ? __('app.right') : __('app.left') }}</span>
                        </p>

                    </div>
                </div>

                @include('frontend.form')

            </div>

            <aside class="details-section__aside">

                <button class="details-section__callus">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17.773" height="17.773" viewBox="0 0 17.773 17.773">
                        <path id="Icon_material-call" data-name="Icon material-call"
                              d="M8.074,12.192A14.957,14.957,0,0,0,14.581,18.7l2.172-2.172a.982.982,0,0,1,1.007-.237,11.263,11.263,0,0,0,3.525.563.99.99,0,0,1,.987.987v3.446a.99.99,0,0,1-.987.987A16.784,16.784,0,0,1,4.5,5.487.99.99,0,0,1,5.487,4.5H8.943a.99.99,0,0,1,.987.987,11.217,11.217,0,0,0,.563,3.525.991.991,0,0,1-.247,1.007L8.074,12.192Z"
                              transform="translate(-4.5 -4.5)"/>
                    </svg>
                    {{__('app.contact_us')}}
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
                <iframe width="100%" height="200px"
                        src="https://maps.google.com/maps?q=tbilisi&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0"
                        scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>

        </div>
    </section>

    <!-- section 4 - might like -->
    <section id="u-might-like">

        <div class="container">

            <h2 class="u-might-like__heading">
                {{__('app.like_it')}}
            </h2>

            <div class="u-might-like__wrapper">

                @if(count($vips) > 0)
                    @foreach($vips as $vip)
                        <div class="card">

                            <div class="card-img-box">
                                @if(!$vip->hasImage())
                                    <img src="{{url('noimageavailable.png')}}">
                                @else
                                    <img src="{{url('storage/product/'.$vip->id.'/'.$vip->image()->get()[0]->name)}}"
                                         alt="">
                                @endif
                            </div>

                            <div class="card__main">

                                <div class="card__top">
                                    <h2 id="c-name">{{$vip->{"title_".app()->getLocale()} }}</h2>
                                    <span id="c-year">{{ date('Y', strtotime($vip->created_date))}}</span>

                                    <div class="currency" id="adviced{{$vip->id}}">
                                        <button class="select-gel active" onclick="changecurrencyvips('adviced{{$vip->id}}', 'gel',{{$vip->id}},{{$dolar}},{{$vip->price}})">$
                                        </button>
                                        <button class="select-dol" onclick="changecurrencyvips('adviced{{$vip->id}}', 'dol',{{$vip->id}},{{$dolar}},{{$vip->price}})">ლ</button>
                                    </div>
                                </div>

                                <div class="card__middle">
                                    <div class="card__middle-top">
                                        <span>{{__('app.price')}}</span>
                                        <span>{{__('app.category')}}</span>
                                    </div>
                                    <div class="card__middle-body">
                                        <p id="c-price" class="vip-gel-{{$vip->id}}">{{number_format($vip->price)}} </p>
                                        <p class="c-category">
                                            {{$vip->transmission->{"title_".app()->getLocale()} }}
                                            / {{$vip->category->{"title_".app()->getLocale()} }}</p>
                                    </div>
                                </div>
                                <div class="card__more-info">

                                    <div class="card__more-info-block">
                                        <div class="card__more-info__label">
                                            <img src="{{url('frontend-assets/img/logos/i-road.svg')}}" alt="">
                                            {{__('app.mileage')}}:
                                        </div>
                                        <p>{{$vip->mileage}}</p>
                                    </div>
                                    <div class="card__more-info-block">
                                        <div class="card__more-info__label">
                                            <img src="{{url('frontend-assets/img/logos/i-car-crash.svg')}}" alt="">
                                            {{__('app.wheel')}}:
                                        </div>
                                        <p>{{$vip->wheel ? __('app.right') : __('app.left')}}</p>
                                    </div>

                                    <div class="card__more-info-block">
                                        <div class="card__more-info__label">
                                            <img src="{{url('frontend-assets/img/logos/phone-call.png')}}" alt="">
                                            {{__('app.mobile_phone')}}:
                                        </div>
                                        <p>{{$vip->phone }}</p>
                                    </div>

                                    <div class="card__more-info-block">
                                        <div class="card__more-info__label">
                                            <img src="{{url('frontend-assets/img/logos/i-dollar-sign.svg')}}" alt="">
                                            {{__('app.type_of_sale')}}:
                                        </div>
                                        <p>{{$vip->deal->{"title_".app()->getLocale()} }}</p>
                                    </div>

                                </div>
                            </div>

                            <div class="card__bottom">
                                <div class="card__bottom-views">
                                    {{--                                    <img src="{{url('frontend-assets/img/logos/i-fire.svg')}}" alt="">--}}
                                    {{--                                    2 {{__('app.people_saw_it')}}--}}
                                </div>

                                <a href="{{route('catalogView',$vip->id)}}" class="card__bottom-btn">
                                    {{__('app.in_details')}}
                                </a>
                            </div>

                        </div>

                    @endforeach
                @endif

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
                {{__('app.last_added')}}
            </h2>

            <div class="newly-added__wrapper">
                @if(count($news) > 0)
                    @foreach($news as $new)
                        <div class="card">

                            <div class="card-img-box">
                                @if(!$new->hasImage())
                                    <img src="{{url('noimageavailable.png')}}">
                                @else
                                    <img src="{{url('storage/product/'.$new->id.'/'.$new->image()->get()[0]->name)}}"
                                         alt="">
                                @endif
                            </div>

                            <div class="card__main">

                                <div class="card__top">
                                    <h2 id="c-name">{{$new->{"title_".app()->getLocale()} }}</h2>
                                    <span id="c-year">{{ date('Y', strtotime($new->created_date))}}</span>

                                    <div class="currency" id="newly{{$new->id}}">
                                        <button class="select-gel active" onclick="changecurrencynews('newly{{$new->id}}', 'gel',{{$new->id}},{{$dolar}},{{$new->price}})">$
                                        </button>
                                        <button class="select-dol" onclick="changecurrencynews('newly{{$new->id}}', 'dol',{{$new->id}},{{$dolar}},{{$new->price}})">ლ</button>
                                    </div>
                                </div>

                                <div class="card__middle">
                                    <div class="card__middle-top">
                                        <span>{{__('app.price')}}</span>
                                        <span>{{__('app.category')}}</span>
                                    </div>
                                    <div class="card__middle-body">
                                        <p id="c-price" class="new-gel-{{$new->id}}">{{number_format($new->price)}} </p>
                                        <p class="c-category">
                                            {{$new->transmission->{"title_".app()->getLocale()} }}
                                            / {{$new->category->{"title_".app()->getLocale()} }}</p>
                                    </div>
                                </div>

                                <div class="card__more-info">

                                    <div class="card__more-info-block">
                                        <div class="card__more-info__label">
                                            <img src="{{url('frontend-assets/img/logos/i-road.svg')}}" alt="">
                                            {{__('app.mileage')}}:
                                        </div>
                                        <p>{{$new->mileage}}</p>
                                    </div>

                                    <div class="card__more-info-block">
                                        <div class="card__more-info__label">
                                            <img src="{{url('frontend-assets/img/logos/i-car-crash.svg')}}" alt="">
                                            {{__('app.wheel')}}:
                                        </div>
                                        <p>{{$new->wheel ? __('app.right') : __('app.left')}}</p>
                                    </div>

                                    <div class="card__more-info-block">
                                        <div class="card__more-info__label">
                                            <img src="{{url('frontend-assets/img/logos/phone-call.png')}}" alt="">
                                            {{__('app.mobile_phone')}}:
                                        </div>
                                        <p>{{$new->phone }}</p>
                                    </div>

                                    <div class="card__more-info-block">
                                        <div class="card__more-info__label">
                                            <img src="{{url('frontend-assets/img/logos/i-dollar-sign.svg')}}" alt="">
                                            {{__('app.type_of_sale')}}:
                                        </div>
                                        <p>{{$new->deal->{"title_".app()->getLocale()} }}</p>
                                    </div>

                                </div>
                            </div>

                            <div class="card__bottom">
                                <div class="card__bottom-views">
                                    {{--                                    <img src="{{url('frontend-assets/img/logos/i-fire.svg')}}" alt="">--}}
                                    {{--                                    2 {{__('app.people_saw_it')}}--}}
                                </div>

                                <a href="{{route('catalogView',$new->id)}}" class="card__bottom-btn">
                                    {{__('app.in_details')}}
                                </a>
                            </div>

                        </div>

                    @endforeach
                @endif
            </div>

        </div>
    </section>


@endsection
@section('custom-scripts')
    <script src="{{url('frontend-assets/script/details.js')}}"></script>
@endsection
