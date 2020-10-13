@extends('admin.layouts.layout')
@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto font-helvetica">
            მოდელის შექმნა </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="intro-y box p-5">
                {!! Form::open() !!}
                <div class="relative mt-2 {{ $errors->has('brand') ? ' has-error' : '' }}">
                    {{ Form::label('brand', 'მწარმოებელი', ['class' => 'font-helvetica']) }}
                    <select name="brand" data-placeholder="Select your favorite actors"
                            class="select2 font-normal text-xs appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        @foreach ($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->title}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="relative mt-4 {{ $errors->has('title') ? ' has-error' : '' }}">
                    {{ Form::label('title', 'სახელი', ['class' => 'font-helvetica']) }}
                    {{ Form::text('title', '', ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                    @if ($errors->has('title'))
                        <span class="help-block">
                                            {{ $errors->first('title') }}
                                        </span>
                    @endif
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
    </script>
@endsection