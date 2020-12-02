@extends('admin.layouts.layout')
@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto font-helvetica">
            პროდუქტის შექმნა </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="intro-y box p-5">
                {!! Form::open(['files' => 'true']) !!}
                <div class="sm:grid grid-cols-3 gap-3 mb-4">
                    <div class="relative mt-3 {{ $errors->has('title_ge') ? ' has-error' : '' }}">
                        {{ Form::label('title_ge', 'სახელი ქართულად', ['class' => 'font-helvetica']) }}
                        {{ Form::text('title_ge', '', ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('title_ge'))
                            <span class="help-block">
                                            {{ $errors->first('title_ge') }}
                                        </span>
                        @endif
                    </div>
                    <div class="relative mt-3 {{ $errors->has('title_en') ? ' has-error' : '' }}">
                        {{ Form::label('title_en', 'სახელი ინგლისურად', ['class' => 'font-helvetica']) }}
                        {{ Form::text('title_en', '', ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('title_en'))
                            <span class="help-block">
                                            {{ $errors->first('title_en') }}
                                        </span>
                        @endif
                    </div>
                    <div class="relative mt-3 {{ $errors->has('title_en') ? ' has-error' : '' }}">
                        {{ Form::label('title_en', 'სახელი ინგლისურად', ['class' => 'font-helvetica']) }}
                        {{ Form::text('title_en', '', ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('title_en'))
                            <span class="help-block">
                                            {{ $errors->first('title_en') }}
                                        </span>
                        @endif
                    </div>
                </div>

                <div class="relative mt-4 {{ $errors->has('description_ge') ? ' has-error' : '' }}">
                    {{ Form::label('description_ge', 'პროდუქტის აღწერა ქართულად', ['class' => 'font-helvetica']) }}
                    {{ Form::textarea('description_ge', '', ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                    @if ($errors->has('description_ge'))
                        <span class="help-block">
                                            {{ $errors->first('description_ge') }}
                                        </span>
                    @endif
                </div>
                <div class="relative mt-4 {{ $errors->has('description_en') ? ' has-error' : '' }}">
                    {{ Form::label('description_en', 'პროდუქტის აღწერა ინგლისურად', ['class' => 'font-helvetica']) }}
                    {{ Form::textarea('description_en', '', ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                    @if ($errors->has('description_en'))
                        <span class="help-block">
                                            {{ $errors->first('description_en') }}
                                        </span>
                    @endif
                </div>
                <div class="relative mt-4 {{ $errors->has('description_en') ? ' has-error' : '' }}">
                    {{ Form::label('description_en', 'პროდუქტის აღწერა ინგლისურად', ['class' => 'font-helvetica']) }}
                    {{ Form::textarea('description_en', '', ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                    @if ($errors->has('description_en'))
                        <span class="help-block">
                                            {{ $errors->first('description_en') }}
                                        </span>
                    @endif
                </div>
                <div class="file-loading">
                    <input id="input-700" name="kartik-input-700[]" type="file" multiple>
                </div>
                <div class="relative mt-3">
                    <button type="submit" name="user_add_submit"
                            class="button w-25 bg-theme-1 text-white font-helvetica">დამატება
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
        $('.side-menu[data-menu="shop"]').addClass('side-menu--active');
        $('.data-menu-item[data-menu="shop"]').addClass('side-menu__sub-open');

        $("#input-700").fileinput({
            theme: 'fa',

            uploadUrl: "/dist/images",
            uploadAsync: false,
            showRemove: false,
            maxFileCount: 3,
            overwriteInitial: false,

        });



    </script>
@endsection