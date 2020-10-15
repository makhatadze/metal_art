@extends('admin.layouts.layout')
@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto font-helvetica">
            მწარმოებლის შექმნა </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="intro-y box p-5">
                {!! Form::open(['files' => 'true']) !!}
                <div class="relative mt-4 {{ $errors->has('title') ? ' has-error' : '' }}">
                    {{ Form::label('title', 'სახელი', ['class' => 'font-helvetica']) }}
                    {{ Form::text('title', '', ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                    @if ($errors->has('title'))
                        <span class="help-block">
                                            {{ $errors->first('title') }}
                                        </span>
                    @endif
                </div>
                <div class="sm:grid grid-cols-2 gap-2">
                    <div class="w-1/2 p-2 {{ $errors->has('files') ? ' has-error' : '' }}">
                        {{ Form::label('image', 'სურათი', ['class' => 'font-helvetica']) }}
                        <div class="border-2 border-dashed rounded-md mt-2 pt-1">
                            <div class="relative mt-1">
                                <div class="px-4 pb-2 flex items-center cursor-pointer relative">
                                    <span class="text-theme-1 mr-1">ატვირთეთ ფაილი</span>
                                    {!! Form::file('image',['class' => 'w-full h-full top-0 left-0 absolute opacity-0', 'id' => 'files', 'name' =>'files']) !!}
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('files'))
                            <span class="help-block">
                                                {{ $errors->first('files') }}
                                            </span>
                        @endif
                    </div>
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

        $("#files").on("change", function (e) {
            var files = e.target.files,
                filesLength = files.length;
            for (var i = 0; i < filesLength; i++) {
                $('.pip').remove();
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function (e) {
                    var file = e.target;
                    $("<span class=\"pip\">" +
                        "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                        "<br/><span class=\"remove\">Remove image</span>" +
                        "</span>").insertAfter("#files");
                    $(".remove").click(function () {
                        $(this).parent(".pip").remove();
                        $('input[name ="files"]').val('')

                    });

                });
                fileReader.readAsDataURL(f);
            }
        });
    </script>
@endsection