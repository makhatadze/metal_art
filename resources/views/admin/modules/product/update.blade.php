@extends('admin.layouts.layout')
@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto font-helvetica">
            პროდუქტის შექმნა -> <span class="text-red-600">თუ ფოტოებს წაშლით გთხოვთ დაამატოთ სხვა ფოტოები, რომ არ აირიოს საიტის დიზაინი</span></h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="intro-y box p-5">
                {!! Form::open(['files' => 'true']) !!}
                <div class="sm:grid grid-cols-3 gap-3 mb-4">
                    <div class="relative mt-3 {{ $errors->has('title_ge') ? ' has-error' : '' }}">
                        {{ Form::label('title_ge', 'სახელი ქართულად', ['class' => 'font-helvetica']) }}
                        {{ Form::text('title_ge', $product->title_ge, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('title_ge'))
                            <span class="help-block">
                                            {{ $errors->first('title_ge') }}
                                        </span>
                        @endif
                    </div>
                    <div class="relative mt-3 {{ $errors->has('title_en') ? ' has-error' : '' }}">
                        {{ Form::label('title_en', 'სახელი ინგლისურად', ['class' => 'font-helvetica']) }}
                        {{ Form::text('title_en', $product->title_en, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('title_en'))
                            <span class="help-block">
                                            {{ $errors->first('title_en') }}
                                        </span>
                        @endif
                    </div>
                    <div class="relative mt-3 {{ $errors->has('title_ru') ? ' has-error' : '' }}">
                        {{ Form::label('title_ru', 'სახელი რუსულად', ['class' => 'font-helvetica']) }}
                        {{ Form::text('title_ru', $product->title_ru, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('title_ru'))
                            <span class="help-block">
                                            {{ $errors->first('title_ru') }}
                                        </span>
                        @endif
                    </div>
                </div>
                <div class="sm:grid grid-cols-3 gap-3 mb-4">
                    <div class="sm:grid grid-cols-1 gap-1 mb-4 {{ $errors->has('categories') ? ' has-error' : '' }}">
                        <div class="relative mt-4 ">
                            {{ Form::label('categories', 'მთავარი კატეგორიები', ['class' => 'font-helvetica']) }}
                            <select name="categories[]" id="categories" onchange="changeCategory()" data-placeholder="აირჩიეთ მთავარი კატეგორია"
                                    class="select2 w-full"
                                    multiple>
                                @if($categories)
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{in_array($category->id,array_column($productCategories,'id')) ? 'selected' : ''}}>{{$category->title_ge}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="sm:grid grid-cols-1 gap-1 mb-4">
                        <div class="relative mt-4 {{ $errors->has('categories') ? ' has-error' : '' }}">
                            {{ Form::label('categories', 'ქვე კატეგორიები', ['class' => 'font-helvetica']) }}
                            <div class="sub-categories-container">
                                <select name="sub_categories[]" data-placeholder="აირჩიეთ ქვე კატეგორია"
                                        class="select2 w-full"
                                        multiple>
                                    @if($categorySubCategories)
                                        @foreach($categorySubCategories as $category)
                                            <option value="{{$category['id']}}" {{in_array($category['id'],array_column($productSubCategories,'id')) ? 'selected' : ''}}>{{$category['title_ge']}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="relative mt-3 inline-flex">
                        <div class="mr-4 {{ $errors->has('price') ? ' has-error' : '' }}">
                            {{ Form::label('price', 'ფასი', ['class' => 'font-helvetica']) }}
                            {{ Form::text('price', $product->price, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                            @if ($errors->has('price'))
                                <span class="help-block">
                                            {{ $errors->first('price') }}
                                        </span>
                            @endif
                        </div>
                        <div class="mr-3"> <label>SALE</label>
                            <div class="mt-2"> <input type="checkbox" {{$product->is_sale ? 'checked' : ''}} name="is_sale" class="input input--switch border"> </div>
                        </div>
                        <div class="mr-4 {{ $errors->has('sale') ? ' has-error' : '' }}">
                            {{ Form::label('sale', 'SALE ფასი', ['class' => 'font-helvetica']) }}
                            {{ Form::text('sale', $product->sale, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                            @if ($errors->has('sale'))
                                <span class="help-block">
                                            {{ $errors->first('sale') }}
                                        </span>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="sm:grid grid-cols-2 gap-2 mb-4">
                    <div class="sm:grid grid-cols-1 gap-1 mb-4">
                        <div class="relative mt-4 {{ $errors->has('sizes') ? ' has-error' : '' }}">
                            {{ Form::label('sizes', 'ზომა', ['class' => 'font-helvetica']) }}
                            <select name="sizes[]"  data-placeholder="აირჩიეთ ზომა"
                                    class="select2 w-full"
                                    multiple>
                                @if($sizes)
                                    @foreach($sizes as $size)
                                        <option value="{{$size->id}}" {{in_array($size->id,array_column($productSizes,'id')) ? 'selected' : ''}}>{{$size->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="sm:grid grid-cols-1 gap-1 mb-4">
                        <div class="relative mt-4 {{ $errors->has('sizes') ? ' has-error' : '' }}">
                            {{ Form::label('colors', 'ფერი', ['class' => 'font-helvetica']) }}
                            <select name="colors[]"  data-placeholder="აირჩიეთ ზომა"
                                    class="select2 w-full"
                                    multiple>
                                @if($colors)
                                    @foreach($colors as $color)
                                        <option value="{{$color->id}}" {{in_array($color->id,array_column($productSizes,'id')) ? 'selected' : ''}} >{{$color->title_ge}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>


                <div class="relative mt-4 {{ $errors->has('description_ge') ? ' has-error' : '' }}">
                    {{ Form::label('description_ge', 'პროდუქტის აღწერა ქართულად', ['class' => 'font-helvetica']) }}
                    {{ Form::textarea('description_ge', $product->description_ge, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                    @if ($errors->has('description_ge'))
                        <span class="help-block">
                                            {{ $errors->first('description_ge') }}
                                        </span>
                    @endif
                </div>
                <div class="relative mt-4 {{ $errors->has('description_en') ? ' has-error' : '' }}">
                    {{ Form::label('description_en', 'პროდუქტის აღწერა ინგლისურად', ['class' => 'font-helvetica']) }}
                    {{ Form::textarea('description_en', $product->description_en, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                    @if ($errors->has('description_en'))
                        <span class="help-block">
                                            {{ $errors->first('description_en') }}
                                        </span>
                    @endif
                </div>
                <div class="relative mt-4 {{ $errors->has('description_ru') ? ' has-error' : '' }}">
                    {{ Form::label('description_ru', 'პროდუქტის აღწერა რუსულად', ['class' => 'font-helvetica']) }}
                    {{ Form::textarea('description_ru', $product->description_ru, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                    @if ($errors->has('description_ru'))
                        <span class="help-block">
                                            {{ $errors->first('description_ru') }}
                                        </span>
                    @endif
                </div>
                <div class="sm:grid grid-cols-4 gap-4 mb-5 mt-5">
                    @if ($product->image)
                        @foreach($product->image as $image)
                            <div class="image-area" id="{{$image->id}}">
                                <img src="{{url('storage/product/'.$product->id.'/'.$image->name)}}" alt="Preview">
                                <a class="remove-image" onclick="imageDelete({{$image->id}})" style="display: inline;">&#215;</a>
                            </div>
                        @endforeach
                    @endif
                </div>


                <div class="file-loading">
                    <input id="input-700" name="kartik-input-700[]" type="file" multiple>
                </div>
                <div class="relative mt-3">
                    <button type="submit" name="user_add_submit"
                            class="button w-25 bg-theme-1 text-white font-helvetica">რედაქტირება
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>

@endsection

@section('custom_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

    <script type="text/javascript">
        $('.side-menu').removeClass('side-menu--active');
        $('.data-menu-item').removeClass('side-menu__sub-open');
        $('.side-menu[data-menu="shop"]').addClass('side-menu--active');
        $('.data-menu-item[data-menu="shop"]').addClass('side-menu__sub-open');

        $("#input-700").fileinput({
            theme: 'fa',
            uploadUrl: '#',
            maxFileCount: 15,
            overwriteInitial: true,

            initialPreviewFileType: 'image',
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            },

        });
        function brandChange(event) {
            $.ajax({
                url: "{{route('getModels')}}",
                data: {
                    'brand': event.target.value,
                }
            }).done(function (data) {
                if (data) {
                    let option = '';
                    data.forEach(el => {
                        option = `${option}
                                <option value="${el.id}">${el.title}</option>
`
                    })

                    $('#brand-model-select').html(option)
                }
            });
        }


        function imageDelete(id) {
            var r = confirm("გსურთ ფოტოს წაშლა?!");
            if (r == true) {
                $.ajax({
                    url: "{{route('imageDelete')}}",
                    data: {
                        'id': id,
                    }
                }).done(function (data) {
                    if (data) {
                        let selector = `#${id}`;
                        $(selector).remove();
                    }
                });
            }
        }

        function changeCategory() {
            let categories = $('#categories').val();
            let subCategoryContainer = $('.sub-categories-container');
            let contentSub = `<select name="sub_categories[]" id="subCategorySelect2" data-placeholder="აირჩიეთ ქვე კატეგორია"
                                        class="select2 w-full"
                       multiple>
            </select>`
            if (categories.length === 0) {
                subCategoryContainer.html(contentSub)
            } else {
                $.ajax({
                    url: `/admin/products/categories`,
                    method: 'get',
                    dataType: 'json',
                    data: {
                        categories: categories
                    }
                }).done(function (data) {
                    if (data.length > 0) {
                        let list = '';
                        data.forEach(el => {
                            list = `${list}<option value="${el.id}">${el.title_ge}</option>`
                        })
                        let cont = `<select name="sub_categories[]" id="subCategorySelect2" data-placeholder="აირჩიეთ ქვე კატეგორია"
                                        class="select2 w-full" multiple>${list}</select>`;
                        subCategoryContainer.html(cont)
                        $('#subCategorySelect2').select2();

                    }
                })
            }
            $('#subCategorySelect2').select2();
        }


    </script>
@endsection