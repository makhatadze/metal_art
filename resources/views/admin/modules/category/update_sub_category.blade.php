@extends('admin.layouts.layout')
@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto font-helvetica">
            ქვე კატეგორიის რედაქტირება </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="intro-y box p-5">
                {!! Form::open() !!}
                <div class="sm:grid grid-cols-3 gap-3 mb-4">
                    <div class="relative mt-4 {{ $errors->has('title_ge') ? ' has-error' : '' }}">
                        {{ Form::label('title_ge', 'სახელი ქართულად', ['class' => 'font-helvetica']) }}
                        {{ Form::text('title_ge', $subCategory->title_ge, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('title_ge'))
                            <span class="help-block">
                                            {{ $errors->first('title_ge') }}
                                        </span>
                        @endif
                    </div>
                    <div class="relative mt-4 {{ $errors->has('title_en') ? ' has-error' : '' }}">
                        {{ Form::label('title_en', 'სახელი ინგლისურად', ['class' => 'font-helvetica']) }}
                        {{ Form::text('title_en', $subCategory->title_en, ['class' => 'input w-full border mt-2 col-span-2']) }}
                        @if ($errors->has('title_en'))
                            <span class="help-block">
                                            {{ $errors->first('title_en') }}
                                        </span>
                        @endif
                    </div>
                    <div class="relative mt-4 {{ $errors->has('title_ru') ? ' has-error' : '' }}">
                        {{ Form::label('title_ru', 'სახელი რუსულად', ['class' => 'font-helvetica']) }}
                        {{ Form::text('title_ru', $subCategory->title_ru, ['class' => 'input w-full border mt-2 col-span-2']) }}
                        @if ($errors->has('title_ru'))
                            <span class="help-block">
                                            {{ $errors->first('title_ru') }}
                                        </span>
                        @endif
                    </div>
                </div>
                <div class="sm:grid grid-cols-1 gap-1 mb-4">
                    <div class="relative mt-4 {{ $errors->has('categories') ? ' has-error' : '' }}">
                        {{ Form::label('categories', 'მთავარი კატეგორიები', ['class' => 'font-helvetica']) }}
                        <select name="categories[]" data-placeholder="აირჩიეთ მთავარი კატეგორია"
                                class="select2 w-full"
                                multiple>
                            @if($categories)
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{in_array($category->id,array_column($subCategoryToCategories,'id')) ? 'selected' : ''}}>{{$category->title_ge}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
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
    <script type="text/javascript">
        $('.side-menu').removeClass('side-menu--active');
        $('.data-menu-item').removeClass('side-menu__sub-open');
        $('.side-menu[data-menu="vehicle"]').addClass('side-menu--active');
        $('.data-menu-item[data-menu="vehicle"]').addClass('side-menu__sub-open');
    </script>
@endsection