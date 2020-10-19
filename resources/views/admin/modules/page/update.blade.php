@extends('admin.layouts.layout')
@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto font-helvetica">
            გვერდის რედაქტირება </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="intro-y box p-5">
                {!! Form::open() !!}
                <div class="relative mt-2 {{ $errors->has('slug') ? ' has-error' : '' }}">
                    {{ Form::label('slug', 'მომხმარებლის სახელი', ['class' => 'font-helvetica']) }}
                    {{ Form::text('slug', $page->slug, ['class' => 'input w-full border mt-2 col-span-2', 'no', 'readOnly' => 'true']) }}
                    @if ($errors->has('slug'))
                        <span class="help-block">
                                            {{ $errors->first('slug') }}
                                        </span>
                    @endif
                </div>
                <div class="sm:grid grid-cols-2 gap-2 mb-4">
                    <div class="relative mt-4 {{ $errors->has('title_ge') ? ' has-error' : '' }}">
                        {{ Form::label('title_ge', 'სახელი ქართულად', ['class' => 'font-helvetica']) }}
                        {{ Form::text('title_ge', $page->title_ge, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('title_ge'))
                            <span class="help-block">
                                            {{ $errors->first('title_ge') }}
                                        </span>
                        @endif
                    </div>
                    <div class="relative mt-4 {{ $errors->has('title_en') ? ' has-error' : '' }}">
                        {{ Form::label('title_en', 'სახელი ინგლისურად', ['class' => 'font-helvetica']) }}
                        {{ Form::text('title_en', $page->title_en, ['class' => 'input w-full border mt-2 col-span-2']) }}
                        @if ($errors->has('title_en'))
                            <span class="help-block">
                                            {{ $errors->first('title_en') }}
                                        </span>
                        @endif
                    </div>
                </div>
                <div class="sm:grid grid-cols-2 gap-2 mb-4">
                    <div class="relative mt-4 {{ $errors->has('meta_title_ge') ? ' has-error' : '' }}">
                        {{ Form::label('meta_title_ge', 'მეტა სახელი ქართულად', ['class' => 'font-helvetica']) }}
                        {{ Form::text('meta_title_ge', $page->meta_title_ge, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('meta_title_ge'))
                            <span class="help-block">
                                            {{ $errors->first('meta_title_ge') }}
                                        </span>
                        @endif
                    </div>
                    <div class="relative mt-4 {{ $errors->has('meta_title_en') ? ' has-error' : '' }}">
                        {{ Form::label('meta_title_en', 'მეტა სახელი ინგლისურად', ['class' => 'font-helvetica']) }}
                        {{ Form::text('meta_title_en', $page->meta_title_en, ['class' => 'input w-full border mt-2 col-span-2']) }}
                        @if ($errors->has('meta_title_en'))
                            <span class="help-block">
                                            {{ $errors->first('meta_title_en') }}
                                        </span>
                        @endif
                    </div>
                </div>
                <div class="sm:grid grid-cols-2 gap-2 mb-4">
                    <div class="relative mt-4 {{ $errors->has('description_ge') ? ' has-error' : '' }}">
                        {{ Form::label('description_ge', 'მოკლე აღწერა ქართულად', ['class' => 'font-helvetica']) }}
                        {{ Form::text('description_ge', $page->description_ge, ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                        @if ($errors->has('description_ge'))
                            <span class="help-block">
                                            {{ $errors->first('description_ge') }}
                                        </span>
                        @endif
                    </div>
                    <div class="relative mt-4 {{ $errors->has('description_en') ? ' has-error' : '' }}">
                        {{ Form::label('description_en', 'მოკლე აღწერა ინგლისურად', ['class' => 'font-helvetica']) }}
                        {{ Form::text('description_en', $page->description_en, ['class' => 'input w-full border mt-2 col-span-2']) }}
                        @if ($errors->has('description_en'))
                            <span class="help-block">
                                            {{ $errors->first('description_en') }}
                                        </span>
                        @endif
                    </div>
                </div>

                <div class="relative mt-4 {{ $errors->has('content_ge') ? ' has-error' : '' }}">
                    {{ Form::label('content_ge', 'საიტის კონტენტი ქართულად', ['class' => 'font-helvetica']) }}
                    {{ Form::textarea('content_ge', $page->content_ge, ['class' => 'input w-full border mt-2 col-span-2']) }}
                    @if ($errors->has('content_ge'))
                        <span class="help-block">
                                            {{ $errors->first('content_ge') }}
                                        </span>
                    @endif
                </div>
                <div class="relative mt-4 {{ $errors->has('content_en') ? ' has-error' : '' }}">
                    {{ Form::label('content_en', 'საიტის კონტენტი ინგლისურად', ['class' => 'font-helvetica']) }}
                    {{ Form::textarea('content_en', $page->content_en, ['class' => 'input w-full border mt-2 col-span-2']) }}
                    @if ($errors->has('content_en'))
                        <span class="help-block">
                                            {{ $errors->first('content_en') }}
                                        </span>
                    @endif
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
        $('.side-menu[data-menu="settings"]').addClass('side-menu--active');
        $('.data-menu-item[data-menu="settings"]').addClass('side-menu__sub-open');
    </script>
@endsection
