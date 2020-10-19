<section id="vip-sales">

    <div class="container">

        <h2 class="vip-sales__heading">
            <img src="{{url('frontend-assets/img/logos/crown-i.svg')}}" alt="">
            VIP {{__('app.announcements')}}
        </h2>

        <div class="vip-sales__slider">
            @if(count($vips) > 0)
                @foreach($vips as $key => $vip)
                    <div class="card">

                        <div class="card-img-box">
                            <img src="{{url('storage/product/'.$vip->id.'/'.$vip->image()->get()[0]->name)}}" alt="">
                        </div>

                        <div class="card__main">

                            <div class="card__top">
                                <h2 id="c-name">{{$vip->{"title_".app()->getLocale()} }}</h2>
                                <span id="c-year">{{ date('Y', strtotime($vip->created_date))}}</span>

                                <div class="currency curr{{$key}}" >
                                    <button class="select-gel active" onclick="changecurrencyClass('curr{{$key}}', 'gel',{{$vip->id}}, {{$dolar}},{{$vip->price}})">ლ</button>
                                    <button class="select-dol" onclick="changecurrencyClass('curr{{$key}}', 'dol',{{$vip->id}}, {{$dolar}},{{$vip->price}})">$</button>
                                </div>
                            </div>

                            <div class="card__middle">
                                <div class="card__middle-top">
                                    <span>{{__('app.price')}}</span>
                                    <span>{{__('app.category')}}</span>
                                </div>
                                <div class="card__middle-body">
                                    <p id="c-price" class="gel-{{$vip->id}}">{{number_format($vip->price, 0)}}</p>
                                    <p class="c-category">{{$vip->new ? __('app.new') : __('app.second')}} / {{$vip->transmission->{"title_".app()->getLocale()} }} / {{$vip->category->{"title_".app()->getLocale()} }}</p>
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
                                        <img src="{{url('frontend-assets/img/logos/gray-car-i.svg')}}" alt="">
                                        {{__('app.condition')}}:
                                    </div>
                                    <p>{{$vip->condition->{"title_".app()->getLocale()} }}</p>
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
{{--                                <img src="{{url('frontend-assets/img/logos/i-fire.svg')}}" alt="">--}}

{{--                                2 {{__('app.people_saw_it')}}--}}
                            </div>

                            <a href="{{route('catalogView',$vip->id)}}" class="card__bottom-btn">
                                {{__('app.in_details')}}
                            </a>
                        </div>

                    </div>
                    <!--end of card -->
                @endforeach
            @endif

        </div>

    </div>
</section>
