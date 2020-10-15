@extends('frontend.layouts.layout')
@section('content')
    @include('frontend.layouts.partials.header')
    @include('frontend.layouts.partials.modal')
    <main>
        <!-- section 1 - hero  -->
        <section id="hero">

            <div class="hero__circle"></div>

            <div class="container">

                <form action="" class="hero__form">
                    <h1 class="hero__form-heading">
                        შეარჩიე მანქანა
                    </h1>
                    <p class="hero__form-p">
                        ლორემ იპსუმ მორიდებას დახუჭვილი უყიდნია ნებისმიერ ნამიან ბნედიანმა ასეა მაკვირვებს ნივთს.
                    </p>


                    <select name="cars">
                        <option value="" disabled selected>მწარმოებელი</option>
                        <option value="random">მწარმოებელი 1</option>
                        <option value="random">მწარმოებელი 2</option>
                        <option value="random">მწარმოებელი 3</option>
                    </select>

                    <select name="cars">
                        <option value="" disabled selected>განბაჟება</option>
                        <option value="random">განბაჟება 1</option>
                        <option value="random">განბაჟება 2</option>
                        <option value="random">განბაჟება 3</option>
                    </select>

                    <select name="cars">
                        <option value="" disabled selected>გადაცემათა კოლოფი</option>
                        <option value="random">გადაცემათა კოლოფი 1</option>
                        <option value="random">გადაცემათა კოლოფი 2</option>
                        <option value="random">გადაცემათა კოლოფი 3</option>
                    </select>

                    <select name="cars">
                        <option value="" disabled selected>ადგილმდებარეობა</option>
                        <option value="random">ადგილმდებარეობა1</option>
                        <option value="random">ადგილმდებარეობა2</option>
                        <option value="random">ადგილმდებარეობა3</option>
                    </select>

                    <button class="hero__form-btn">
                        გაფილტვრა
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
                    ჩვენ გირჩევთ
                </h1>

                <div class="we-advice__item-wrapper">
                    @for($i = 0; $i <8; $i++)
                        <div class="card">

                            <div class="card-img-box">
                                <img src="{{url('storage/product/'.$products[0]->id.'/'.$products[0]->image()->get()[0]->name)}}">
                            </div>

                            <div class="card__main">

                                <div class="card__top">
                                    <h2 id="c-name">{{$products[0]->{"title_".app()->getLocale()} }}</h2>
                                    <span id="c-year">{{ date('Y', strtotime($products[0]->created_date))}}</span>

                                    <div class="currency" id="adviced{{$i}}">
                                        <button class="select-gel active" onclick="changecurrency('adviced{{$i}}', 'gel')">
                                            ლ
                                        </button>
                                        <button class="select-dol" onclick="changecurrency('adviced{{$i}}', 'dol')">$
                                        </button>
                                    </div>
                                </div>

                                <div class="card__middle">
                                    <div class="card__middle-top">
                                        <span>ფასი</span>
                                        <span>კატეგორია</span>
                                    </div>
                                    <div class="card__middle-body">
                                        <p id="c-price">{{number_format($products[0]->price, 2)}} </p>
                                        <p class="c-category">{{$products[0]->new ? 'ახალი' : 'მეორადი'}}
                                            / {{$products[0]->transmission->{"title_".app()->getLocale()} }}
                                            / {{$products[0]->category->{"title_".app()->getLocale()} }}</p>
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
                                        <p>{{$products[0]->condition->{"title_".app()->getLocale()} }}</p>
                                    </div>

                                    <div class="card__more-info-block">
                                        <div class="card__more-info__label">
                                            <img src="{{url('frontend-assets/img/logos/i-dollar-sign.svg')}}" alt="">

                                            გაყიდვის ტიპი:
                                        </div>
                                        <p>{{$products[0]->deal->{"title_".app()->getLocale()} }}</p>
                                    </div>

                                </div>
                            </div>

                            <div class="card__bottom">
                                <div class="card__bottom-views">
                                    <img src="{{url('frontend-assets/img/logos/i-fire.svg')}}" alt="">
                                    2 ადამიანი ნახულობს
                                </div>

                                <a href="{{route('catalogView',$products[0]->id)}}" class="card__bottom-btn">
                                    დეტალურად
                                </a>
                            </div>

                        </div>

                    @endfor
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
@endsection

