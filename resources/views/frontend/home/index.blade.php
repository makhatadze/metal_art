<?php
    $categories = \App\Models\Category::all();
?>
test
@extends('frontend.layouts.layout')
@section('content')
    <!-- section 1 - hero -->
    <section id="hero" class="child">
        @if(count($categories) > 0)
            <div class="hero-top">
                <a href="/{{app()->getLocale()}}/products?category={{$categories[0]->id}}" class="hero-link hero-left">
                    <img src="frontend-assets/img/hero-left.jpg" alt="product">
                    <div class="overlay"></div>
                    <p>{{__('app.interior')}}</p>
                </a>
                <a href="/{{app()->getLocale()}}/products?category={{$categories[1]->id}}" class="hero-link hero-right">
                    <img src="frontend-assets/img/hero-right.png" alt="product">
                    <div class="overlay"></div>
                    <p>{{__('app.exterior')}}</p>
                </a>
            </div>
        @endif
        <div class="hero-body">
            <div class="bg-top"></div>

            <div class="hero-content">
                <a href="/{{app()->getLocale()}}/products"  class="vertical-t">
                    {{ __('app.all_product') }} <img src="frontend-assets/img/logos/triangle.png" alt="">
                </a>

                <h2 class="hero-heading">{{__('app.our_product')}}</h2>

                <p class="hero-sub-heading">
                    {{$page->{"description".app()->getLocale()} }}
                </p>

                <div class="hero-slider">
                    @if(count($vips) > 0)
                        @foreach($vips as $vip)
                            <div class="slide-item">
                                <div class="overlay"></div>
                                @if(!$vip->hasImage())
                                    <img src="{{url('noimageavailable.png')}}">
                                @else
                                    <img src="{{url('storage/product/'.$vip->id.'/'.$vip->image()->get()[0]->name)}}">
                                @endif
                                <div class="hero-hover">
                                    <p>{{$vip->{"title_".app()->getLocale()} }}</p>
                                    <a href="{{route('detailView',$vip->id)}}" class="hero-item-btn">{{__('app.details')}}</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

    </section>

    <!-- section 2 - product of day -->
    @if($dayProduct != null)
        <section id="day-product">
            <div class="overlay-left"></div>
            <div class="overlay-right"></div>

            <div class="day-product-wrap">
                <div class="day-p-left">
                    @if(!$dayProduct->hasImage())
                        <img src="{{url('noimageavailable.png')}}">

                    @else
                        @if(count($dayProduct->image()->get()) > 1)
                            <img src="{{url('storage/product/'.$dayProduct->id.'/'.$dayProduct->image()->get()[1]->name)}}">
                        @else
                            <img src="{{url('storage/product/'.$dayProduct->id.'/'.$dayProduct->image()->get()[0]->name)}}">
                        @endif
                    @endif
                </div>
                <div class="day-product-content">
                    <div class="day-product-info">
                        <h3 class="day-p-title">{{__('app.day_product')}}</h3>
                        <h2 class="day-p-name">{{$dayProduct->{"title_".app()->getLocale()} }}</h2>
                        <p class="day-p-text">{{$dayProduct->{"description_".app()->getLocale()} }}
                        </p>

                        <a href="{{route('detailView',$dayProduct->id)}}" class="day-p-link">{{__('app.details')}}</a>

                    </div>
                    <div class="day-product-img">
                        @if(!$dayProduct->hasImage())
                            <img src="{{url('noimageavailable.png')}}">

                        @else
                            <img src="{{url('storage/product/'.$dayProduct->id.'/'.$dayProduct->image()->get()[0]->name)}}">

                        @endif
                    </div>
                </div>
            </div>
        </section>

    @endif
    <!-- section 3 - hello - about us -->
    <section id="video" class="child">
        <div class="half-side">
            <div class="video-container">

                <div class="video-box">
                    <img class="cover-img" src="frontend-assets/img/video-p.png" alt="">
                    <div class="video-text">
                        <p class="p-top">{{ __('app.process_1') }}</p>
                        <p class="p-bot">{{ __('app.process_2') }}<span class="white-t">{{ __('app.process_3') }}</span></p>
                    </div>

                    <div class="overl"></div>

                    <button class="video-btn">
                        <img class="play" src="frontend-assets/img/logos/play-icon.png" alt="">
                        <div class="v-btn-t">
                            {{ __('app.watch_1') }}  <br> {{ __('app.watch_2') }}
                        </div>
                    </button>

                </div>
            </div>

        </div>

        <div class="half-side">
            <div class="hello-container">
                <h1 class="hello-heading">
                    {{ __('app.hello') }}!
                </h1>
                <p class="hello-p">
                    {!! $page->{"content_".app()->getLocale()} !!}
                </p>

                <div class="about-btn-w">
                    <a href="{{route('contactIndex')}}" class="hello-about-btn">
                        {{__('app.contact_us')}}
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

    @include('frontend.vendor.module.about')


@endsection

