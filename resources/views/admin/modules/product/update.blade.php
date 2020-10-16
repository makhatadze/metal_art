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
                <div class="sm:grid grid-cols-4 gap-4 mb-4">
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
                    <div class="relative mt-3 {{ $errors->has('luggage') ? ' has-error' : '' }}">
                        {{ Form::label('luggage', 'საბარგულის ზომა', ['class' => 'font-helvetica']) }}
                        {{ Form::text('luggage', $product->luggage, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('luggage'))
                            <span class="help-block">
                                            {{ $errors->first('luggage') }}
                                        </span>
                        @endif
                    </div>
                    <div class="relative mt-3 {{ $errors->has('mileage') ? ' has-error' : '' }}">
                        {{ Form::label('mileage', 'გარბენის ოდენობა', ['class' => 'font-helvetica']) }}
                        {{ Form::text('mileage', $product->mileage, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('mileage'))
                            <span class="help-block">
                                            {{ $errors->first('mileage') }}
                                        </span>
                        @endif
                    </div>
                </div>
                <div class="sm:grid grid-cols-4 gap-4 mb-4">
                    <div class="relative mt-4 {{ $errors->has('price') ? ' has-error' : '' }}">
                        {{ Form::label('price', 'ფასი ლარში', ['class' => 'font-helvetica']) }}
                        {{ Form::text('price', $product->price, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('price'))
                            <span class="help-block">
                                            {{ $errors->first('price') }}
                                        </span>
                        @endif
                    </div>
                    <div class="relative mt-4 {{ $errors->has('custom') ? ' has-error' : '' }}">
                        {{ Form::label('custom', 'განბაჟებული', ['class' => 'font-helvetica']) }}
                        {{ Form::select('custom',[1=>'კი',0=>'არა'], $product->custom, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('custom'))
                            <span class="help-block">
                                            {{ $errors->first('custom') }}
                                        </span>
                        @endif
                    </div>
                    <div class="relative mt-4 {{ $errors->has('new') ? ' has-error' : '' }}">
                        {{ Form::label('new', 'მანქანის შესახებ', ['class' => 'font-helvetica']) }}
                        {{ Form::select('new',[1=>'ახალი',0=>'მეორადი'], $product->new, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('new'))
                            <span class="help-block">
                                            {{ $errors->first('new') }}
                                        </span>
                        @endif
                    </div>
                    <div class="relative mt-4">
                        <label class="font-helvetica">გარიგების ტიპი</label>
                        <div class="mt-2">
                            <select data-placeholder="აირჩიეთ გარიგების ტიპი"
                                    name="deal"
                                    value="{{$product->deal_id}}"
                                    class="font-helvetica select2 w-full">
                                @foreach ($deals as $deal)
                                    <option value="{{$deal->id}}"> {{$deal->title_ge}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="sm:grid grid-cols-4 gap-4 mb-4">
                    <div class="relative mt-4">
                        <label class="font-helvetica">კატეგორია</label>
                        <div class="mt-2">
                            <select data-placeholder="აირჩიეთ კატეგორია"
                                    name="category"
                                    value="{{$product->category_id}}"
                                    class="font-helvetica select2 w-full">
                                @foreach ($categories as $cat)
                                    <option value="{{$cat->id}}"> {{$cat->title_ge}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="relative mt-4">
                        <label class="font-helvetica">ტრანსმისია</label>
                        <div class="mt-2">
                            <select data-placeholder="აირჩიეთ ტრანსმისია"
                                    name="transmission"
                                    value="{{$product->transmission_id}}"
                                    class="font-helvetica select2 w-full">
                                @foreach ($transmissions as $trans)
                                    <option value="{{$trans->id}}"> {{$trans->title_ge}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="relative mt-4 {{ $errors->has('engine_capacity') ? ' has-error' : '' }}">
                        {{ Form::label('engine_capacity', 'ძრავის მოცულობა', ['class' => 'font-helvetica']) }}
                        <input class="input w-full border mt-2 col-span-2"
                               type="number" required min="0.1" value="0.1" step="0.1" name="engine_capacity"
                               value="{{$product->engine_capacity}}">
                        @if ($errors->has('engine_capacity'))
                            <span class="help-block">
                                            {{ $errors->first('engine_capacity') }}
                                        </span>
                        @endif
                    </div>
                    <div class="relative mt-4">
                        <label class="font-helvetica">საწვავი</label>
                        <div class="mt-2">
                            <select data-placeholder="აირჩიეთ საწვავი"
                                    name="fuel"
                                    value="{{$product->fuel_id}}"
                                    class="font-helvetica select2 w-full">
                                @foreach ($fuels as $fuel)
                                    <option value="{{$fuel->id}}"> {{$fuel->title_ge}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="sm:grid grid-cols-4 gap-4 mb-4">
                    <div class="relative mt-4 {{ $errors->has('people') ? ' has-error' : '' }}">
                        {{ Form::label('people', 'მგზავრების ოდენობა', ['class' => 'font-helvetica']) }}
                        {{ Form::text('people', $product->people, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('people'))
                            <span class="help-block">
                                            {{ $errors->first('people') }}
                                        </span>
                        @endif
                    </div>
                    <div class="relative mt-4 {{ $errors->has('door') ? ' has-error' : '' }}">
                        {{ Form::label('door', 'კარებების ოდენობა', ['class' => 'font-helvetica']) }}
                        {{ Form::text('door', $product->door, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('door'))
                            <span class="help-block">
                                            {{ $errors->first('door') }}
                                        </span>
                        @endif
                    </div>
                    <div class="relative mt-4 {{ $errors->has('wheel') ? ' has-error' : '' }}">
                        {{ Form::label('wheel', 'wheel', ['class' => 'font-helvetica']) }}
                        {{ Form::select('wheel',[1=>'მარჯვენა',0=>'მარცხენა'], $product->wheel, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('wheel'))
                            <span class="help-block">
                                            {{ $errors->first('wheel') }}
                                        </span>
                        @endif
                    </div>
                    <div class="relative mt-4 {{ $errors->has('vip') ? ' has-error' : '' }}">
                        {{ Form::label('vip', 'VIP', ['class' => 'font-helvetica']) }}
                        {{ Form::select('vip',[1=>'კი',0=>'არა'], $product->vip, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('vip'))
                            <span class="help-block">
                                            {{ $errors->first('vip') }}
                                        </span>
                        @endif
                    </div>

                </div>
                <div class="sm:grid grid-cols-4 gap-4 mb-2">

                    <div class="relative mt-4">
                        <label class="font-helvetica">მწარმოებელი</label>
                        <div class="mt-2">
                            <select data-placeholder="აირჩიეთ მწარმოებელი" onchange="brandChange(event)"
                                    name="brand" id="brand"
                                    value="{{$product->brand_id}}"
                                    class="font-helvetica select2 w-full">
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}"> {{$brand->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="relative mt-4" id="brand-model">
                        <label class="font-helvetica">მოდელი</label>
                        <div class="mt-2">
                            <select data-placeholder="აირჩიეთ მოდელი" name="model" value="{{$product->model_id}}"
                                    id="brand-model-select"
                                    class="font-helvetica select2 w-full">
                                @foreach ($brandModels as $model)
                                    <option value="{{$model->id}}"> {{$model->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="relative mt-4 {{ $errors->has('created_date') ? ' has-error' : '' }}">
                        {{ Form::label('created_date', 'გამოშვების თარიღი', ['class' => 'font-helvetica']) }}
                        {{ Form::date('created_date', Carbon\Carbon::parse($product->created_date), ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('created_date'))
                            <span class="help-block">
                                            {{ $errors->first('created_date') }}
                                        </span>
                        @endif
                    </div>
                    <div class="relative mt-4">
                        <label class="font-helvetica">მდგომარეობა</label>
                        <div class="mt-2">
                            <select data-placeholder="აირჩიეთ მდგომარეობა"
                                    name="condition" value="{{$product->condition_id}}"
                                    class="font-helvetica select2 w-full">
                                @foreach ($conditions as $cond)
                                    <option value="{{$cond->id}}"> {{$cond->title_ge}}</option>
                                @endforeach
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

    </script>
@endsection