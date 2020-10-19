@extends('frontend.layouts.layout')
@section('content')
    @include('frontend.layouts.partials.header')
    @include('frontend.layouts.partials.modal')
    <main>
        <!-- section 1 - hero  -->
        <section id="hero">

            <div class="hero__circle"></div>

            <div class="container">

                <form action="{{app()->getLocale()}}/catalog" class="hero__form">
                    <h1 class="hero__form-heading">
                        {{ $page->{"meta_title_".app()->getLocale()} }}
                    </h1>
                    <p class="hero__form-p">
                        {{ $page->{"description_".app()->getLocale()} }}
                    </p>


                    <select name="brand">
                        @if ($brands)
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->title }}</option>
                            @endforeach
                        @endif
                    </select>

                    <select name="custom">
                        <option value="1">{{__('app.custom_cleared')}}</option>
                        <option value="0">{{__('app.before_customs')}}</option>
                    </select>

                    <select name="transmission">
                        @if ($transmissions)
                            @foreach($transmissions as $trans)
                                <option value="{{$trans->id}}">{{$trans->{"title_".app()->getLocale()} }}</option>
                            @endforeach
                        @endif
                    </select>

                    <select name="condition">
                        @if ($conditions)
                            @foreach($conditions as $cond)
                                <option value="{{$cond->id}}">{{$cond->{"title_".app()->getLocale()} }}</option>
                            @endforeach
                        @endif
                    </select>

                    <button class="hero__form-btn">
                        {{__('app.search')}}
                    </button>

                </form>

                <div class="hero__right">
                    <img src="{{url('frontend-assets/img/hero-img.png')}}" alt="">
                </div>
            </div>

        </section>
        <!-- section 2 - vip sales -->
    @include('frontend.home.vip')
    <!-- section 3 - AD  Banner-->
        <section id="banner">
            <div class="container">
                <div class="banner__img-box">
                    <img src="{{url('frontend-assets/img/baner-full.png')}}" alt="">
                </div>
            </div>
        </section>


        <!-- section 4 - we advice -->
        <section id="we-advice">
            <div class="container">

                <h1 class="we-advice__heading">
                    <img src="{{url('frontend-assets/img/logos/ios-star.svg')}}" alt="">
                    {{__('app.we_recommended')}}
                </h1>

                <div class="we-advice__item-wrapper">
                    @if(count($products) >0)
                        @for($i = 0; $i <8; $i++)
                            @if(isset($products[$i]))
                                <div class="card">

                                    <div class="card-img-box">
                                        <img src="{{url('storage/product/'.$products[0]->id.'/'.$products[0]->image()->get()[0]->name)}}">
                                    </div>

                                    <div class="card__main">

                                        <div class="card__top">
                                            <h2 id="c-name">{{$products[$i]->{"title_".app()->getLocale()} }}</h2>
                                            <span id="c-year">{{ date('Y', strtotime($products[$i]->created_date))}}</span>

                                            <div class="currency" id="adviced{{$i}}">
                                                <button class="select-gel active"
                                                        onclick="changecurrency('adviced{{$i}}', 'gel',{{$products[$i]->id}}, {{$dolar}},{{$products[$i]->price}})">
                                                    ლ
                                                </button>
                                                <button class="select-dol" onclick="changecurrency('adviced{{$i}}', 'dol',{{$products[$i]->id}},{{$dolar}},{{$products[$i]->price}})">$
                                                </button>
                                            </div>
                                        </div>

                                        <div class="card__middle">
                                            <div class="card__middle-top">
                                                <span>{{__('app.price')}}</span>
                                                <span>{{__('app.category')}}</span>
                                            </div>
                                            <div class="card__middle-body">
                                                <p id="c-price" class="gel-{{$products[$i]->id}}">{{number_format($products[$i]->price, 0)}} </p>
                                                <p class="c-category">{{$products[$i]->new ? __('app.new') : __('app.second')}}
                                                    / {{$products[$i]->transmission->{"title_".app()->getLocale()} }}
                                                    / {{$products[$i]->category->{"title_".app()->getLocale()} }}</p>
                                            </div>
                                        </div>

                                        <div class="card__more-info">

                                            <div class="card__more-info-block">
                                                <div class="card__more-info__label">
                                                    <img src="{{url('frontend-assets/img/logos/i-road.svg')}}" alt="">

                                                    {{__('app.mileage')}}:
                                                </div>
                                                <p>{{$products[$i]->mileage}}</p>
                                            </div>

                                            <div class="card__more-info-block">
                                                <div class="card__more-info__label">
                                                    <img src="{{url('frontend-assets/img/logos/i-car-crash.svg')}}" alt="">

                                                    დაზიანება:
                                                </div>
                                                <p>არ აქვს</p>
                                            </div>

                                            <div class="card__more-info-block">
                                                <div class="card__more-info__label">
                                                    <img src="{{url('frontend-assets/img/logos/gray-car-i.svg')}}" alt="">

                                                    {{__('app.condition')}}:
                                                </div>
                                                <p>{{$products[0]->condition->{"title_".app()->getLocale()} }}</p>
                                            </div>

                                            <div class="card__more-info-block">
                                                <div class="card__more-info__label">
                                                    <img src="{{url('frontend-assets/img/logos/i-dollar-sign.svg')}}" alt="">

                                                    {{__('app.type_of_sale')}}:
                                                </div>
                                                <p>{{$products[$i]->deal->{"title_".app()->getLocale()} }}</p>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="card__bottom">
                                        <div class="card__bottom-views">
{{--                                            <img src="{{url('frontend-assets/img/logos/i-fire.svg')}}" alt="">--}}
{{--                                            2 ადამიანი ნახულობს--}}
                                        </div>

                                        <a href="{{route('catalogView',$products[$i]->id)}}" class="card__bottom-btn">
                                            {{__('app.in_details')}}
                                        </a>
                                    </div>

                                </div>

                            @endif
                        @endfor

                    @endif
                </div>

                <a href="{{route('catalogIndex')}}" class="we-advice__allproduct-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16.784" height="11.689" viewBox="0 0 16.784 11.689">
                        <g id="Icon_feather-list" data-name="Icon feather-list" transform="translate(0.75 0.75)">
                            <path id="Path_332" data-name="Path 332" d="M12,9H23.039" transform="translate(-7.754 -9)"
                                  fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                            <path id="Path_333" data-name="Path 333" d="M12,18H23.039"
                                  transform="translate(-7.754 -12.905)" fill="none" stroke-linecap="round"
                                  stroke-linejoin="round" stroke-width="1.5"/>
                            <path id="Path_334" data-name="Path 334" d="M12,27H23.039"
                                  transform="translate(-7.754 -16.811)" fill="none" stroke-linecap="round"
                                  stroke-linejoin="round" stroke-width="1.5"/>
                            <path id="Path_335" data-name="Path 335" d="M4.5,9h0" transform="translate(-4.5 -9)"
                                  fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                            <path id="Path_336" data-name="Path 336" d="M4.5,18h0" transform="translate(-4.5 -12.905)"
                                  fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                            <path id="Path_337" data-name="Path 337" d="M4.5,27h0" transform="translate(-4.5 -16.811)"
                                  fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                        </g>
                    </svg>
                    ყველა პროდუქტი
                </a>
            </div>
        </section>
    </main>

@endsection
@section('custom_scripts')
    <script src="{{ url('frontend-assets/script/index.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        });
    </script>
@endsection

