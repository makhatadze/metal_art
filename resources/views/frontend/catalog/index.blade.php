@extends('frontend.layouts.layout')
@section('content')
    @include('frontend.layouts.partials.detail-header')
    @include('frontend.layouts.partials.modal')
    <!-- section 1 -  catalogue -->
    <section id="catalogue">
        <div class="container">

            <div class="catalogue__wrapper">

                <div class="catalogue__left">
                    <form action="/{{app()->getLocale()}}/catalogue">
                        @csrf
                        <div class="catalogue__filter">
                            <h1 class="catalogue__filter-heading">
                                {{__('app.filter')}}
                            </h1>

                            <h2 class="catalogue__filter-category">
                                {{__('app.Manufacturer')}}
                            </h2>
                            <div class="catalogue__select-wrap">
                                <div class="catalogue__select-img">
                                    <img src="{{url('frontend-assets/img/logos/gray-car-i.svg')}}" alt="">
                                </div>
                                <select name="brand" class="select2" value="{{Request::get('brand') ? Request::get('brand') : 1}}" onchange="brandChange(event)">
                                    @if ($brands)
                                        @foreach($brands as $brand)
                                            <option {{(Request::get('brand') && Request::get('brand') == $brand->id) ? 'selected' : ''}} value="{{$brand->id}}">{{$brand->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <h2 class="catalogue__filter-category">
                                {{__('app.model')}}
                            </h2>
                            <div class="catalogue__select-wrap">
                                <div class="catalogue__select-img">
                                    <img src="{{url('frontend-assets/img/logos/gray-car-i.svg')}}" alt="">
                                </div>
                                <select name="model" class="select2" id="brand-model">
                                    @if ($brandModels)
                                        @foreach($brandModels as $mod)
                                            <option {{(Request::get('model') && Request::get('model') == $mod->id) ? 'selected' : ''}} value="{{$mod->id}}">{{$mod->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <h2 class="catalogue__filter-category">
                                {{__('app.custom')}}
                            </h2>
                            <div class="catalogue__select-wrap">
                                <div class="catalogue__select-img">
                                    <img src="{{url('frontend-assets/img/logos/gray-car-i.svg')}}" alt="">
                                </div>
                                <select name="custom" class="select2">
                                    <option {{(Request::get('custom') == 1) ? 'selected' : ''}} value="1">{{__('app.custom_cleared')}}</option>
                                    <option {{(Request::get('custom') == 0) ? 'selected' : ''}} value="0">{{__('app.before_customs')}}</option>
                                </select>
                            </div>


                            <h2 class="catalogue__filter-category">
                                {{__('app.category')}}
                            </h2>
                            <div class="catalogue__select-wrap">
                                <div class="catalogue__select-img">
                                    <img src="{{url('frontend-assets/img/logos/gray-car-i.svg')}}" alt="">
                                </div>
                                <select name="category" class="select2">
                                    @if ($categories)
                                        @foreach($categories as $cat)
                                            <option {{(Request::get('custom') == $cat->id) ? 'selected' : ''}} value="{{$cat->id}}">{{$cat->{"title_".app()->getLocale()} }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <h2 class="catalogue__filter-category">
                                {{__('app.release_date')}}
                            </h2>
                            <div class="catalogue__select-wrap half">
                                <select name="date_from" class="select2">
                                    @foreach(array_reverse(range(1980,date("Y"))) as $date )
                                    <option {{(Request::get('date_from') == $date) ? 'selected' : ''}} value="{{$date}}">{{$date}}</option>
                                    @endforeach
                                </select>

                                <select name="date_to" class="select2">
                                    @foreach(array_reverse(range(1980,date("Y"))) as $date )
                                        <option {{(Request::get('date_to') == $date) ? 'selected' : ''}} value="{{$date}}">{{$date}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <h2 class="catalogue__filter-category" >
                                {{__('app.price')}}
                            </h2>
                            <div class="catalogue__select-wrap half">
                                <input type="number" id="price" placeholder="{{__('app.price_from')}}"  name="price_from" value="{{Request::get('price_from')}}">
                                <input type="number" id="price" placeholder="{{__('app.price_to')}}" name="price_to" value="{{Request::get('price_to')}}">
                            </div>

                            <input hidden name="searchValue" value="{{Request::get('searchValue') ? Request::get('searchValue') : ''}}">
                            <h2 class="catalogue__filter-category">
                                {{__('app.transmission')}}
                            </h2>
                            <div class="catalogue__select-wrap">
                                <div class="catalogue__select-img">
                                    <img src="{{url('frontend-assets/img/logos/gray-car-i.svg')}}" alt="">
                                </div>
                                <select name="transmission" class="select2">
                                    @if ($transmissions)
                                        @foreach($transmissions as $trans)
                                            <option {{(Request::get('transmission') == $trans->id) ? 'selected' : ''}} value="{{$trans->id}}">{{$trans->{"title_".app()->getLocale()} }}</option>
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

                                {{__('app.search')}}
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
                                <span id="cars-found">{{number_format($products->total(), 0)}}</span> {{__('app.car')}}
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
                                <input id="search-input" value="{{Request::get('searchValue') ? Request::get('searchValue') : ''}}" onchange="changeSearch(event)" type="text" placeholder="ძიება">
                            </div>
                        </div>

                        <div class="catalogue__header-location">
                            <a href="{{route('site')}}">{{__('app.site')}}</a> &nbsp; &#47; &nbsp;
                            <span>{{__('app.catalog')}}</span>
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

                        @if(count($products) > 0)
                            @foreach($products as $key => $product)
                                <div class="catalogue-card">

                                    <div class="card-img-box">
                                        <img src="{{url('storage/product/'.$product->id.'/'.$product->image()->get()[0]->name)}}">
                                    </div>

                                    <div class="catalogue-card__wrap">

                                        <div class="card__top">
                                            <h2>{{$product->{"title_".app()->getLocale()} }}</h2>

                                            <p class="card__top-p">
                                                {{$product->fuel->{"title_".app()->getLocale()} }} & {{$product->category->{"title_".app()->getLocale()} }}
                                            </p>
                                            <p class="card__top-p">
                                                {{__('app.year')}} : {{ date('Y', strtotime($product->created_date))}}
                                            </p>

                                            <p class="card-list-data">
                                                <img src="{{url('frontend-assets/img/logos/date-range.svg')}}" alt="">
                                                {{__('app.release_date')}} : {{date('Y/m/d',strtotime($product->created_at))}}
                                            </p>

                                        </div>

                                        <div class="card-list-about">
                                            {{$product->{"description_".app()->getLocale()} }}
                                        </div>

                                        <div class="card-list-right">
                                            <div class="card__more-info">

                                                <div class="card__more-info-block">
                                                    <div class="card__more-info__label">
                                                        <img src="{{url('frontend-assets/img/logos/car-engine.png')}}" alt="">
                                                        {{$product->engine_capacity}}
                                                    </div>
                                                </div>

                                                <div class="card__more-info-block">
                                                    <div class="card__more-info__label">
                                                        <img src="{{url('frontend-assets/img/logos/speedometer-i.png')}}" alt="">
                                                        {{$product->mileage}}
                                                    </div>
                                                </div>

                                                <div class="card__more-info-block">
                                                    <div class="card__more-info__label">
                                                        <img src="{{url('frontend-assets/img/logos/manual-transmission.png')}}" alt="">
                                                        {{$product->transmission->{"title_".app()->getLocale()} }}
                                                    </div>
                                                </div>

                                                <div class="card__more-info-block">
                                                    <div class="card__more-info__label">
                                                        <img src="{{url('frontend-assets/img/logos/steering-wheel.png')}}" alt="">
                                                        {{$product->wheel ? __('app.right'): __('app.left')}}
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="catalogue-card__bottom">

                                                <div class="currency" id="curr{{$key}}">
                                                    <button class="select-gel active"
                                                            onclick="changecurrency('curr{{$key}}', 'gel',{{$product->id}}, {{$dolar}},{{$product->price}})">$
                                                    </button>
                                                    <button class="select-dol" onclick="changecurrency('curr{{$key}}', 'dol',{{$product->id}}, {{$dolar}},{{$product->price}})">₾
                                                    </button>
                                                </div>

                                                <p>
                                                    <span id="catalogue-item-price" class="gel-{{$product->id}}">{{number_format($product->price, 0)}}</span>
                                                </p>
                                                <a class="cataloguecard__btn" href="{{route('catalogView',$product->id)}}">
                                                    {{__('app.in_details')}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            @endforeach
                        @else
                            <h1>{{__('app.result_not_found')}}</h1>
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

@endsection
