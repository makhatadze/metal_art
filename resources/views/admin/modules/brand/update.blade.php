@extends('admin.layouts.layout')
@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto font-helvetica">
            კატეგორიის შექმნა </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="intro-y box p-5">
                {!! Form::open(['files' => 'true']) !!}
                <div class="sm:grid grid-cols-2 gap-2 mb-4">
                    <div class="relative mt-4 {{ $errors->has('title') ? ' has-error' : '' }}">
                        {{ Form::label('title', 'სახელი', ['class' => 'font-helvetica']) }}
                        {{ Form::text('title', $brand->title, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('title'))
                            <span class="help-block">
                                            {{ $errors->first('title') }}
                                        </span>
                        @endif
                    </div>
                </div>
                <div class="sm:grid grid-cols-4 gap-4 mb-5 mt-5">
                    @if ($brand->image)
                        @foreach($brand->image as $image)
                            <div class="image-area" id="{{$image->id}}">
                                <img src="{{url('storage/brand/'.$brand->id.'/'.$image->name)}}" alt="Preview">
                                <a class="remove-image" onclick="imageDelete({{$image->id}})" style="display: inline;">&#215;</a>
                            </div>
                        @endforeach
                    @endif
                </div>
                <h1 class="mt-5 mb-4">ფოტოს ატვირთვისას ავტომატურად წინა ფოტო წაიშლება!!</h1>

                <div class="file-loading mt-3">
                    <input id="input-700" name="kartik-input-700" type="file" >
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


        $("#input-700").fileinput({
            theme: 'fa',
            uploadUrl: '#',
            maxFileCount: 1,
            overwriteInitial: true,

            initialPreviewFileType: 'image',
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            },

        });

        function imageDelete(id) {
            var r = confirm("გსურთ ფოტოს წაშლა?!");
            if (r == true) {
                $.ajax({
                    url: "{{route('brandImageDelete')}}",
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