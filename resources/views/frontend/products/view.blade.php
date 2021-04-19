@extends('frontend.layouts.layout')
@section('content')
    <!-- section 1 - details -->
    <section id="details">
        <div class="detail-wrap">

            <div class="pictures">

                <div class="main-img">
                    @if(!$product->hasImage())
                        <img  src="{{url('noimageavailable.png')}}">

                    @else
                        <img class="xzoom" src="{{url('storage/product/'.$product->id.'/'.$product->image()->get()[0]->name)}}">
                    @endif
                </div>

                <div class="xzoom-thumbs">
                    @if($product->hasImage())
                        @foreach($product->image()->get() as $key => $image)
                            @if($key < 3)
                                <a href="{{url('storage/product/'.$product->id.'/'.$image->name)}}">
                                    <img class="xzoom-gallery"   width="80" src="{{url('storage/product/'.$product->id.'/'.$image->name)}}"   xpreview="{{url('storage/product/'.$product->id.'/'.$image->name)}}">
                                </a>
                            @endif
                        @endforeach
                    @endif
                </div>

            </div>

            <div class="product-details">
                <h1 class="product-name">{{$product->{"title_".app()->getLocale()} }}</h1>

                <p class="product-category">
                    {!! $product->{"description_".app()->getLocale()} !!}
                </p>

                <div class="size-box">
                    {{__('app.color')}}:
                    <select name="size" id="">
                        @if(count($product->colors) > 0)
                            @foreach($product->colors as $color)
                                <option value="0" default>{{$color->{"title_".app()->getLocale()} }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="size-box">
                    {{__('app.size')}}:
                    <select name="size" id="">
                        @if(count($product->sizes) > 0)
                            @foreach($product->sizes as $size)
                                <option value="0" default>{{$size->title }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                @if($product->is_sale && $product->sale)
                    <div class="price-box" style="margin-bottom: 5px; ">{{__('app.old_price')}}: ₾ <span class="Price" style="color: red">{{number_format($product->price, 0)}}</span></div>
                    <div class="price-box">{{__('app.sale_price')}}: ₾ <span class="Price">{{number_format($product->sale, 0)}}</span></div>
                @else
                    <div class="price-box">{{__('app.price')}}: ₾ <span class="Price">{{number_format($product->price, 0)}}</span></div>

                @endif

                <button class="order-btn">{{__('app.order')}}</button>
            </div>
        </div>

    </section>

    @include('frontend.vendor.module.detail')

    <!-- section 2 - additational products -->
    <section id="more-products">
        <div class="more-p-wrap">

            <div class="nav-panel">
                <button class="products-btn selected">{{ __('app.related_products') }}</button>
            </div>

            <div class="products-slider">
                @if(count($relatedProducts) > 0)
                    @foreach($relatedProducts as $pro)
                        <div class="product-slide-item">
                            @if(!$product->hasImage())
                                <img  src="{{url('noimageavailable.png')}}">

                            @else
                                <img src="{{url('storage/product/'.$pro->id.'/'.$pro->image()->get()[0]->name)}}">
                            @endif

                            <div class="product-hover">
                                @if($pro->is_sale && $pro->sale)
                                    <div class="pro-price"> ₾{{number_format($pro->sale, 0)}}</div>
                                @else
                                    <div class="pro-price"> ₾{{number_format($pro->price, 0)}}</div>
                                @endif
                                <div class="pro-name">{{$pro->{"title_".app()->getLocale()} }}</div>

                                <a href="{{route('detailView',$pro->id)}}"  class="pro-link">{{__('app.in_details')}}</a>

                            </div>
                        </div>
                    @endforeach
                @endif




            </div>
        </div>

    </section>


    @include('frontend.vendor.module.about')

@endsection

