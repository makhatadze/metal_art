<section id="vip-sales">

    <div class="container">

        <h2 class="vip-sales__heading">
            <img src="{{url('frontend-assets/img/logos/crown-i.svg')}}" alt="">
            VIP განცხადებები
        </h2>

        <div class="vip-sales__slider">

            @for($i=0;$i<5;$i++)
                <div class="card">

                    <div class="card-img-box">
                        <img src="{{url('storage/product/'.$vips[0]->id.'/'.$vips[0]->image()->get()[0]->name)}}" alt="">
                    </div>

                    <div class="card__main">

                        <div class="card__top">
                            <h2 id="c-name">{{$vips[0]->{"title_".app()->getLocale()} }}</h2>
                            <span id="c-year">{{ date('Y', strtotime($vips[0]->created_date))}}</span>

                            <div class="currency curr{{$i}}" >
                                <button class="select-gel active" onclick="changecurrencyClass('curr{{$i}}', 'gel')">ლ</button>
                                <button class="select-dol" onclick="changecurrencyClass('curr{{$i}}', 'dol')">$</button>
                            </div>
                        </div>

                        <div class="card__middle">
                            <div class="card__middle-top">
                                <span>ფასი</span>
                                <span>კატეგორია</span>
                            </div>
                            <div class="card__middle-body">
                                <p id="c-price">{{number_format($vips[0]->price, 2)}}</p>
                                <p class="c-category">{{$products[0]->new ? 'ახალი' : 'მეორადი'}} / {{$products[0]->transmission->{"title_".app()->getLocale()} }} / {{$products[0]->category->{"title_".app()->getLocale()} }}</p>
                            </div>
                        </div>

                        <div class="card__more-info">

                            <div class="card__more-info-block">
                                <div class="card__more-info__label">
                                    <img src="{{url('frontend-assets/img/logos/i-road.svg')}}" alt="">
                                    გარბენი:
                                </div>
                                <p>{{$products[0]->mileage}}</p>
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

                                    მდგომარეობა:
                                </div>
                                <p>იქოქება და დადის</p>
                            </div>

                            <div class="card__more-info-block">
                                <div class="card__more-info__label">
                                    <img src="{{url('frontend-assets/img/logos/i-dollar-sign.svg')}}" alt="">

                                    გაყიდვის ტიპი:
                                </div>
                                <p>განვადება, ხელზე</p>
                            </div>

                        </div>
                    </div>

                    <div class="card__bottom">
                        <div class="card__bottom-views">
                            <img src="{{url('frontend-assets/img/logos/i-fire.svg')}}" alt="">

                            2 ადამიანი ნახულობს
                        </div>

                        <a href="{{route('catalogView',$vips[0]->id)}}" class="card__bottom-btn">
                            დეტალურად
                        </a>
                    </div>

                </div>
                <!--end of card -->
            @endfor

        </div>

    </div>
</section>
