@extends('admin.layouts.layout')
@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto font-helvetica">
            მწარმოებლის შექმნა </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="intro-y box p-5">
                {!! Form::open() !!}
                <div class="relative mt-4 {{ $errors->has('title') ? ' has-error' : '' }}">
                    {{ Form::label('title', 'სახელი', ['class' => 'font-helvetica']) }}
                    {{ Form::text('title', '', ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                    @if ($errors->has('title'))
                        <span class="help-block">
                                            {{ $errors->first('title') }}
                                        </span>
                    @endif
                </div>
                <div class="flex justify-between items-center mt-5">
                    <h6 class="font-bold">
                        მოდელის დამატება
                    </h6>
                    <button id="addNewModel"
                            class="bg-gray-200 font-bold p-2 rounded-md h-8 w-8 focus:outline-none flex items-center justify-center"
                            type="button">+
                    </button>
                </div>
                <div class="relative mt-4 model-container">
                    <input name="model[]" class="input w-full border mt-2 col-span-2" type="text">
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
        $('.side-menu[data-menu="vehicle"]').addClass('side-menu--active');
        $('.data-menu-item[data-menu="vehicle"]').addClass('side-menu__sub-open');
        $('#addNewModel').on('click', function () {
            $('.model-container').append(`
                                    <input name="model[]" class="input w-full border mt-2 col-span-2"  type="text">

            `);
        })

    </script>
@endsection