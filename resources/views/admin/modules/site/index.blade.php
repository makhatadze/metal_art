@extends('admin.layouts.layout')
@section('content')
    <div class="row mt-5 mb-5">
        {!! Form::open(['method'=>'POST']) !!}
        <div class="col-span-6 xxl:col-span-3 -mb-10 pb-10 mb-5">
            <div class="inline-flex">
                <h3 class="font-bold font-caps text-gray-700 text-xl ">დღის პროდუქტი --</h3>
                @if($dayProduct == null)
                    <h3 class="ml-4 font-bold font-caps text-gray-700 text-xl"> არ არის ჯერ არჩეული</h3>
                @else
                    <a href="{{route('productUpdate',$dayProduct->id)}}">
                        <h3 class="ml-4 font-bold font-caps text-gray-700 text-xl text-decoration-underline"> {{$dayProduct->title_ge}}</h3>
                    </a>
                @endif
            </div>
            <div class="box mt-3 p-2">
                <div class="flex flex-wrap -mx-3  mt-3">
                    <div class=" px-3 mb-6 md:mb-0 {{ $errors->has('id') ? ' has-error' : '' }}">
                        {{ Form::label('product  ', '', ['class' => 'font-helvetica']) }}
                        <select name="product" id="categories"  data-placeholder=""
                                class="select2 w-full">
                            @if(count($productsSelect) > 0)
                                @foreach($productsSelect as $product)
                                    <option value="{{$product->id}}">{{$product->title_ge}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <button type="submit"
                                class=" block appearance-none font-bold font-caps bg-indigo-500 text-xs text-white bg-gray-200 border border-gray-200  py-3 px-4 pr-8 rounded leading-tight"
                                id="category-search">
                            დღის პროდუქტის შეცვლა
                        </button>
                    </div>
                </div>

            </div>

            {!! Form::close() !!}    </div>
    </div>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href="{{route('productCreate')}}" class="button text-white bg-theme-1 shadow-md mr-2">პროდუქტის დამატება</a>
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
            <tr>
                <th class="border-b-2 whitespace-no-wrap">#</th>
                <th class="border-b-2 text-center whitespace-no-wrap">სახელი ქართულად</th>
                <th class="border-b-2 text-center whitespace-no-wrap">სახელი ინგლისურად</th>
                <th class="border-b-2 text-center whitespace-no-wrap">ფასი</th>
                <th class="border-b-2 text-center whitespace-no-wrap">VIP</th>
                <th class="border-b-2 text-center whitespace-no-wrap">სტატუსი</th>
                <th class="border-b-2 text-center whitespace-no-wrap">მოქმედება</th>
            </tr>
            </thead>
            <tbody>
            @if(count($products) > 0)
                @foreach($products as $product)
                    <tr>
                        <td class="border-b">
                            <div class="text-gray-600 text-xs whitespace-no-wrap">{{ $product->id }}</div>
                        </td>
                        <td class="border-b">
                            <div class="flex items-center sm:justify-center "> {{ $product->title_ge }}</div>
                        </td>
                        <td class="border-b">
                            <div class="flex items-center sm:justify-center "> {{ $product->title_en }}</div>
                        </td>
                        <td class="border-b">
                            <div class="flex items-center sm:justify-center "> {{ $product->price }}</div>
                        </td>
                        <td class="w-40 border-b">
                            @if($product->vip)
                                <a href={{route('productVip',$product->id)}} class="flex items-center sm:justify-center text-theme-9">VIP</a>
                            @else
                                <a href={{route('productVip',$product->id)}} class="flex items-center sm:justify-center "> სტანდარტი</a>
                            @endif
                        </td>

                        <td class="w-40 border-b">
                            @if($product->status)
                                <a href={{route('productActivate',$product->id)}} class="flex items-center sm:justify-center text-theme-9"> <i
                                        data-feather="check-square" class="w-4 h-4 mr-2"></i> აქტიური</a>
                            @else
                                <a href={{route('productActivate',$product->id)}} class="flex items-center sm:justify-center text-theme-6"> <i
                                        data-feather="check-square" class="w-4 h-4 mr-2"></i> არა აქტიური </a>
                            @endif
                        </td>
                        <td class="border-b w-5">
                            <div class="flex sm:justify-center items-center">
                                <a class="flex items-center mr-3" href={{route('productUpdate',$product->id)}}> <i
                                            data-feather="check-square" class="w-4 h-4 mr-1"></i> რედაქტირება </a>
                                <a class="flex items-center text-theme-6"  onclick="return confirm('გსურთ წაშლა?');" href="{{route('productDelete',$product->id)}}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> წაშლა </a>

                            </div>
                        </td>
                    </tr>
                @endforeach

            @endif
            </tbody>
        </table>
    </div>

@endsection

@section('custom_scripts')
    <script type="text/javascript">
        $('.side-menu').removeClass('side-menu--active');
        $('.data-menu-item').removeClass('side-menu__sub-open');
        $('.side-menu[data-menu="home"]').addClass('side-menu--active');
        $('.data-menu-item[data-menu="home"]').addClass('side-menu__sub-open');
    </script>
@endsection