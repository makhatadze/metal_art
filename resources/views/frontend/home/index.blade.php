<?php
    $categories = \App\Models\Category::all();
?>
@extends('frontend.layouts.layout')
@section('content')
    <!-- section 1 - hero -->
    <section id="hero" class="child">

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
    <section id="day-product">
        <div class="overlay-left"></div>
        <div class="overlay-right"></div>

        <div class="day-product-wrap">
            <div class="day-p-left">
                @if(!$vips[0]->hasImage())
                    <img src="{{url('noimageavailable.png')}}">

                @else
                    <img src="{{url('storage/product/'.$vips[0]->id.'/'.$vips[0]->image()->get()[0]->name)}}">

                @endif
            </div>
            <div class="day-product-content">
                <div class="day-product-info">
                    <h3 class="day-p-title">{{__('app.day_product')}}</h3>
                    <h2 class="day-p-name">{{$vips[0]->{"title_".app()->getLocale()} }}</h2>
                    <p class="day-p-text">{{$vips[0]->{"description_".app()->getLocale()} }}
                    </p>

                    <a href="{{route('detailView',$vips[0]->id)}}" class="day-p-link">{{__('app.details')}}</a>

                </div>
                <div class="day-product-img">
                    @if(!$vips[0]->hasImage())
                        <img src="{{url('noimageavailable.png')}}">

                    @else
                        <img src="{{url('storage/product/'.$vips[0]->id.'/'.$vips[0]->image()->get()[0]->name)}}">

                    @endif
                </div>
            </div>
        </div>
    </section>

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

