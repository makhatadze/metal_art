@extends('frontend.layouts.layout')
@section('content')
    @include('frontend.layouts.partials.detail-header')
    @include('frontend.layouts.partials.modal')
    <!-- section 1 -  catalogue -->
    <section id="catalogue">
        <div class="container">

            <div class="catalogue__wrapper">

                <div class="catalogue__left">
                    <form action="/{{app()->getLocale()}}/catalog">
                        <div class="catalogue__filter">
                            <h1 class="catalogue__filter-heading">
                                ფილტრი
                            </h1>

                            <h2 class="catalogue__filter-category">
                                მწარმოებელი
                            </h2>
                            <div class="catalogue__select-wrap">
                                <div class="catalogue__select-img">
                                    <img src="{{url('frontend-assets/img/logos/gray-car-i.svg')}}" alt="">
                                </div>
                                <select name="brand" value="{{Request::get('brand') ? Request::get('brand') : 1}}">
                                    @if ($brands)
                                        @foreach($brands as $brand)
                                            <option {{(Request::get('brand') && Request::get('brand') == $brand->id) ? 'selected' : ''}} value="{{$brand->id}}">{{$brand->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <h2 class="catalogue__filter-category">
                                მოდელი
                            </h2>
                            <div class="catalogue__select-wrap">
                                <div class="catalogue__select-img">
                                    <img src="{{url('frontend-assets/img/logos/gray-car-i.svg')}}" alt="">
                                </div>
                                <select name="model">
                                    @if ($brandModels)
                                        @foreach($brandModels as $mod)
                                            <option {{(Request::get('model') && Request::get('model') == $mod->id) ? 'selected' : ''}} value="{{$mod->id}}">{{$mod->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <h2 class="catalogue__filter-category">
                                {{__('app.condition')}}
                            </h2>
                            <div class="catalogue__select-wrap">
                                <div class="catalogue__select-img">
                                    <img src="{{url('frontend-assets/img/logos/gray-car-i.svg')}}" alt="">
                                </div>
                                <select name="condition">
                                    @if ($conditions)
                                        @foreach($conditions as $cond)
                                            <option {{(Request::get('condition') && Request::get('condition') == $cond->id) ? 'selected' : ''}} value="{{$cond->id}}">{{$cond->{"title_".app()->getLocale()} }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <h2 class="catalogue__filter-category">
                                განბაჟების ტიპი
                            </h2>
                            <div class="catalogue__select-wrap">
                                <div class="catalogue__select-img">
                                    <img src="{{url('frontend-assets/img/logos/gray-car-i.svg')}}" alt="">
                                </div>
                                <select name="custom">
                                    <option {{(Request::get('custom') == 1) ? 'selected' : ''}} value="1">{{__('app.custom_cleared')}}</option>
                                    <option {{(Request::get('custom') == 0) ? 'selected' : ''}} value="0">{{__('app.before_customs')}}</option>
                                </select>
                            </div>


                            <h2 class="catalogue__filter-category">
                                კატეგორია
                            </h2>
                            <div class="catalogue__select-wrap">
                                <div class="catalogue__select-img">
                                    <img src="{{url('frontend-assets/img/logos/gray-car-i.svg')}}" alt="">
                                </div>
                                <select name="category">
                                    @if ($categories)
                                        @foreach($categories as $cat)
                                            <option {{(Request::get('custom') == $cat->id) ? 'selected' : ''}} value="{{$cat->id}}">{{$cat->{"title_".app()->getLocale()} }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <h2 class="catalogue__filter-category">
                                გამოშვების წელი - დან
                            </h2>
                            <div class="catalogue__select-wrap half">
                                <select name="date_from">
                                    @foreach(range(1980,date("Y")) as $date )
                                    <option {{(Request::get('date_from') == $date) ? 'selected' : ''}} value="{{$date}}">{{$date}}</option>
                                    @endforeach
                                </select>

                                <select name="date_to">
                                    @foreach(range(1980,date("Y")) as $date )
                                        <option {{(Request::get('date_to') == $date) ? 'selected' : ''}} value="{{$date}}">{{$date}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <h2 class="catalogue__filter-category">
                                ფასი
                            </h2>
                            <div class="catalogue__select-wrap half">
                                <label for="price_from">{{__('app.from')}}</label>
                                <input type="number" name="price_from" value="{{Request::get('price_from')}}">
                                <label for="price_to">{{__('app.to')}}</label>
                                <input type="number" name="price_to" value="{{Request::get('price_to')}}">
                            </div>


                            <h2 class="catalogue__filter-category">
                                ტრანსმისია
                            </h2>
                            <div class="catalogue__select-wrap">
                                <div class="catalogue__select-img">
                                    <img src="{{url('frontend-assets/img/logos/gray-car-i.svg')}}" alt="">
                                </div>
                                <select name="transmission">
                                    @if ($transmissions)
                                        @foreach($transmissions as $trans)
                                            <option {{(Request::get('transmission') == $trans->id) ? 'selected' : ''}} value="{{$trans->id}}">{{$trans->{"title_".app()->getLocale()} }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <h2 class="catalogue__filter-category">
                                საწვავის ტიპი
                            </h2>
                            <div class="catalogue__select-wrap">
                                <div class="catalogue__select-img">
                                    <img src="{{url('frontend-assets/img/logos/gray-car-i.svg')}}" alt="">
                                </div>
                                <select name="engine">
                                    @if ($engines)
                                        @foreach($engines as $engine)
                                            <option {{(Request::get('engine') == $engine->id) ? 'selected' : ''}} value="{{$engine->id}}">{{$engine->{"title_".app()->getLocale()} }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>


                            <button class="catalogue__filter-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15.442" height="13.998"
                                     viewBox="0 0 15.442 13.998">
                                    <path id="Icon_feather-filter" data-name="Icon feather-filter"
                                          d="M17.442,4.5H3l5.777,6.831v4.723L11.665,17.5V11.331Z"
                                          transform="translate(-2.5 -4)" fill="none" stroke-linecap="round"
                                          stroke-linejoin="round" stroke-width="1"/>
                                </svg>

                                გაფილტვრა
                            </button>


                        </div>

                    </form>

                    <div class="catalogue-ad">
                        <img class="img-cover" src="{{url('frontend-assets/img/catalogue-ad.png')}}" alt="">
                    </div>
                </div>

                <div class="catalogue__items">

                    <div class="catalogue__header">

                        <div class="header-left">
                            <p>
                                <span id="cars-found">{{number_format($products->total(), 0)}}</span> მანქანა
                            </p>

                            <div class="catalogue__header-search-box">
                                <button class="search-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="7.998" height="8"
                                         viewBox="0 0 7.998 8">
                                        <path id="Icon_ionic-ios-search" data-name="Icon ionic-ios-search"
                                              d="M12.4,11.914,10.18,9.669a3.17,3.17,0,1,0-.481.487l2.21,2.231a.342.342,0,0,0,.483.012A.345.345,0,0,0,12.4,11.914ZM7.689,10.183a2.5,2.5,0,1,1,1.77-.733A2.488,2.488,0,0,1,7.689,10.183Z"
                                              transform="translate(-4.5 -4.493)" fill="#fd8d0f"/>
                                    </svg>

                                </button>
                                <input id="search-input" type="text" placeholder="ძიება">
                            </div>
                        </div>

                        <div class="catalogue__header-location">
                            <a href="{{route('site')}}">{{__('app.site')}}</a> &nbsp; &#47; &nbsp;
                            <span>კატალოგი</span>
                        </div>

                        <div class="catalogue__header-view-btns">
                            <button class="display-list ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="10" viewBox="0 0 11 10">
                                    <g id="Group_1972" data-name="Group 1972" transform="translate(-1616.5 -156)">
                                        <line id="Line_47" data-name="Line 47" x2="11"
                                              transform="translate(1616.5 156.5)" fill="none" stroke-width="1"/>
                                        <line id="Line_48" data-name="Line 48" x2="11"
                                              transform="translate(1616.5 159.5)" fill="none" stroke-width="1"/>
                                        <line id="Line_49" data-name="Line 49" x2="11"
                                              transform="translate(1616.5 162.5)" fill="none" stroke-width="1"/>
                                        <line id="Line_50" data-name="Line 50" x2="11"
                                              transform="translate(1616.5 165.5)" fill="none" stroke-width="1"/>
                                    </g>
                                </svg>
                            </button>
                            <button class="display-grid active">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10.818" height="10.818"
                                     viewBox="0 0 10.818 10.818">
                                    <path id="Icon_open-grid-three-up" data-name="Icon open-grid-three-up"
                                          d="M0,0V2.7H2.7V0ZM4.057,0V2.7h2.7V0ZM8.113,0V2.7h2.7V0ZM0,4.057v2.7H2.7v-2.7Zm4.057,0v2.7h2.7v-2.7Zm4.057,0v2.7h2.7v-2.7ZM0,8.113v2.7H2.7v-2.7Zm4.057,0v2.7h2.7v-2.7Zm4.057,0v2.7h2.7v-2.7Z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="catalogue__item-wrap">

                        @if($products)
                            @foreach($products as $key => $product)
                                <div class="catalogue-card">

                                    <div class="card-img-box">
                                        <img src="{{url('storage/product/'.$product->id.'/'.$product->image()->get()[0]->name)}}">
                                    </div>

                                    <div class="catalogue-card__wrap">

                                        <div class="card__top">
                                            <h2>{{$product->title_ge}}</h2>

                                            <p class="card__top-p">
                                                {{$product->engine->title_ge}} & {{$product->category->title_ge}}
                                            </p>
                                            <p class="card__top-p">
                                                წელი : {{ date('Y', strtotime($product->created_date))}}
                                            </p>

                                            <p class="card-list-data">
                                                <img src="./img/logos/date-range.svg" alt="">
                                                განთავსების თარიღი : {{date('Y/m/d',strtotime($product->created_at))}}
                                            </p>

                                        </div>

                                        <div class="card-list-about">
                                            {{$product->description_ge}}
                                        </div>

                                        <div class="card-list-right">
                                            <div class="card__more-info">

                                                <div class="card__more-info-block">
                                                    <div class="card__more-info__label">
                                                        <img src="{{url('frontend-assets/img/logos/car-engine.png')}}" alt="">
                                                        {{$product->engine_capacity}} {{$product->engine->title_ge}}
                                                    </div>
                                                </div>

                                                <div class="card__more-info-block">
                                                    <div class="card__more-info__label">
                                                        <img src="{{url('frontend-assets/img/logos/speedometer-i.png')}}" alt="">
                                                        {{$product->mileage}} კმ
                                                    </div>
                                                </div>

                                                <div class="card__more-info-block">
                                                    <div class="card__more-info__label">
                                                        <img src="{{url('frontend-assets/img/logos/manual-transmission.png')}}" alt="">
                                                        {{$product->transmission->title_ge}}
                                                    </div>
                                                </div>

                                                <div class="card__more-info-block">
                                                    <div class="card__more-info__label">
                                                        <img src="{{url('frontend-assets/img/logos/steering-wheel.png')}}" alt="">
                                                        {{$product->wheel ? 'მარჯვენა': 'მარცხენა'}}
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="catalogue-card__display">
                                                <div class="catalogue-card__display-info">
                                                    <img src="{{url('frontend-assets/img/logos/people-i.png')}}" alt="">
                                                    <p>3</p>
                                                </div>
                                                <div class="catalogue-card__display-info">
                                                    <img src="{{url('frontend-assets/img/logos/i-shopping-bag.png')}}" alt="">
                                                    <p>5</p>
                                                </div>
                                                <div class="catalogue-card__display-info">
                                                    <img src="{{url('frontend-assets/img/logos/car-door.png')}}" alt="">
                                                    <p>4</p>
                                                </div>
                                                <div class="catalogue-card__display-info">
                                                    <img src="{{url('frontend-assets/img/logos/i-snowflake.png')}}" alt="">
                                                    <p>A/C</p>
                                                </div>
                                            </div>

                                            <div class="catalogue-card__bottom">

                                                <div class="currency" id="curr{{$key}}">
                                                    <button class="select-gel active"
                                                            onclick="changecurrency('curr{{$key}}', 'gel')">₾
                                                    </button>
                                                    <button class="select-dol" onclick="changecurrency('curr{{$key}}', 'dol')">$
                                                    </button>
                                                </div>

                                                <p>
                                                    <span id="catalogue-item-price">{{number_format($product->price, 2)}}</span>
                                                </p>
                                                <a class="cataloguecard__btn">
                                                    კონტაქტი
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            @endforeach
                        @else
                            <h1>Result not found</h1>
                        @endif
                        <!-- card end-->




                    </div>
                    {{ $products->links('frontend.vendor.pagination.custom') }}
                </div>
            </div>

        </div>
    </section>


@endsection
@section('custom-scripts')
    <script src="{{url('frontend-assets/script/test.js')}}"></script>
@endsection
