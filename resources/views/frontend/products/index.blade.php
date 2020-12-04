@extends('frontend.layouts.layout')
@section('content')
    <!-- section 1 - gallery -->
    <section id="gallery">

        <div class="gallery-wrap">
            <h1 class="gallery-heading">{{__('app.product')}}</h1>
            <form action="/{{app()->getLocale()}}/products" id="product-search-form">
            <div class="sort-panel">
                <select name="category" onchange="submitForm()">
                    <option value="">{{__('app.category')}}</option>
                    @if(count($categories) > 0)
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{(Request::get('category') && Request::get('category') == $category->id) ? 'selected' : '' }} >{{$category->{"title_".app()->getLocale()} }}</option>
                        @endforeach
                    @endif
                </select>
                <select name="sub_category" onchange="submitForm()">
                    <option value="">{{__('app.sub_category')}}</option>
                    @if(count($subCategories) > 0)
                        @foreach($subCategories as $category)
                            <option value="{{$category->id}}" {{(Request::get('sub_category') && Request::get('sub_category') == $category->id) ? 'selected' : ''}} >{{$category->{"title_".app()->getLocale()} }}</option>
                        @endforeach
                    @endif
                </select>


                <select name="size" id="" onchange="submitForm()">
                    <option value="">{{__('app.size')}}</option>
                    @foreach($sizes as $size)
                        <option value="{{$size->id}}" {{(Request::get('size') && Request::get('size') == $size->id) ? 'selected' : ''}} >{{$size->title }}</option>
                    @endforeach
                </select>

                <select name="color" id="" onchange="submitForm()">
                    <option value="">{{__('app.color')}}</option>
                    @foreach($colors as $color)
                        <option value="{{$color->id}}" {{(Request::get('color') && Request::get('color') == $color->id) ? 'selected' : ''}}>{{$color->{"title_".app()->getLocale()} }}</option>
                    @endforeach
                </select>

                <input type="number" onchange="submitForm()" value="{{Request::get('price_from')}}" min="0" name="price_from" class="from" placeholder="{{ __('app.price_from') }}">

                <input type="number" onchange="submitForm()" value="{{Request::get('price_to')}}" min="0" name="price_to" class="to" placeholder="{{ __('app.price_to') }}">

            </div>

            <div class="gallery-content">
                @if(count($products) > 0)
                    @foreach($products as $product)
                        <div class="gallery-item">
                            @if(!$product->hasImage())
                                <img src="{{url('noimageavailable.png')}}">
                            @else
                                <img src="{{url('storage/product/'.$product->id.'/'.$product->image()->get()[0]->name)}}">
                            @endif

                            <div class="gallery-hover">
                                <a href="{{route('detailView',$product->id)}}">{{__('app.details')}}</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            {{ $products->links('frontend.vendor.pagination.custom') }}
        </div>
    </section>
    <script>
        function submitForm() {
            document.getElementById("product-search-form").submit();        }
    </script>
@endsection

