@extends('admin.layouts.layout')
<?php
$contactActive = (
        $errors->has('admin_email') ||
        $errors->has('contact_email') ||
        $errors->has('support_email') ||
        $errors->has('phone') ||
        $errors->has('address_ge') ||
        $errors->has('address_en')
    ) ?   'active' :   '';
$socialActive =  (
    $errors->has('facebook_url') ||
    $errors->has('instagram_url') ||
    $errors->has('youtube_url')
) ?   'active' :   '';

$mailerActive =  (
    $errors->has('smtp_host') ||
    $errors->has('smtp_port') ||
    $errors->has('smtp_encrypted') ||
    $errors->has('smtp_email') ||
    $errors->has('smtp_password') ||
    $errors->has('smtp_subject')
) ?   'active' :   '';
?>
@section('content')
    <div class="row mt-5">
        <div class="col-lg-12">
            <h1 class="page-header">საიტის პარამეტრები</h1>
            {{ Request::get('site_title_ge') }}

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="intro-y chat grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Chat Side Menu -->
        <div class="col-span-12 lg:col-span-12 ">
            <div class="intro-y pr-1">
                <div class="box p-2">
                    <div class="chat__tabs nav-tabs justify-center flex">
                        <a data-toggle="tab"
                           data-target="#general-settings"
                           href="javascript:;"
                           class="flex-1 py-2 rounded-md text-center {{(!session('contact-update') && !session('social-update') && !session('mailer-update') && !$contactActive && !$socialActive && !$mailerActive) ? 'active' : ''}}">საიტის
                            ზოგადი პარამეტრები</a>
                        <a data-toggle="tab"
                           data-target="#contact"
                           href="javascript:;"
                           class="flex-1 py-2 rounded-md text-center {{session('contact-update') ? 'active' : ''}} {{$contactActive}}">საკონტაქტო ინფორმაცია</a>
                        <a data-toggle="tab"
                           data-target="#social"
                           href="javascript:;"
                           class="flex-1 py-2 rounded-md text-center  {{session('social-update') ? 'active' : ''}} {{$socialActive}}">სოციალური ქსელები</a>
                        <a data-toggle="tab"
                           data-target="#mailer"
                           href="javascript:;"
                           class="flex-1 py-2 rounded-md text-center  {{session('mailer-update') ? 'active' : ''}} {{$mailerActive}}">მეილერის სისტემა</a>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-content__pane {{(!session('contact-update') && !session('social-update') && !session('mailer-update') && !$contactActive && !$socialActive && !$mailerActive) ? 'active' : ''}}" id="general-settings">
                    <div class="pr-1">
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="intro-y col-span-12 lg:col-span-8">
                                <div class="intro-y box p-5">
                                    {!! Form::open(['route' => 'settingsIndex', 'method' => 'POST']) !!}
                                    <div class="relative mt-2 {{ $errors->has('site_url') ? ' has-error' : '' }}">
                                        {{ Form::label('site_url', 'საიტის მისამართი', ['class' => 'font-helvetica']) }}
                                        {{ Form::text('site_url', $datas['site_url'], ['class' => 'input w-full border mt-2 col-span-2', 'no', 'readOnly' => 'true',]) }}
                                        @if ($errors->has('site_url'))
                                            <span class="help-block">
                                            {{ $errors->first('site_url') }}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="sm:grid grid-cols-2 gap-2 mb-4">
                                        <div class="relative mt-4 {{ $errors->has('site_title_ge') ? ' has-error' : '' }}">
                                            {{ Form::label('site_title_ge', 'საიტის სახელი ქართულად', ['class' => 'font-helvetica']) }}
                                            {{ Form::text('site_title_ge', $datas['site_title_ge'], ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                                            @if ($errors->has('site_title_ge'))
                                                <span class="help-block">
                                                          {{ $errors->first('site_title_ge') }}
                                                     </span>
                                            @endif
                                        </div>
                                        <div class="relative mt-4 {{ $errors->has('site_title_en') ? ' has-error' : '' }}">
                                            {{ Form::label('site_title_en', 'საიტის სახელი ინგლისურად', ['class' => 'font-helvetica']) }}
                                            {{ Form::text('site_title_en', $datas['site_title_en'], ['class' => 'input w-full border mt-2 col-span-2']) }}
                                            @if ($errors->has('site_title_en'))
                                                <span class="help-block">
                                            {{ $errors->first('site_title_en') }}
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="sm:grid grid-cols-2 gap-2 mb-4">
                                        <div class="relative mt-4 {{ $errors->has('site_meta_title_ge') ? ' has-error' : '' }}">
                                            {{ Form::label('site_meta_title_ge', 'საიტის მეტა აღწერა ქართულად', ['class' => 'font-helvetica']) }}
                                            {{ Form::text('site_meta_title_ge', $datas['site_meta_title_ge'], ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                                            @if ($errors->has('site_meta_title_ge'))
                                                <span class="help-block">
                                            {{ $errors->first('site_meta_title_ge') }}
                                        </span>
                                            @endif
                                        </div>
                                        <div class="relative mt-4 {{ $errors->has('site_meta_title_en') ? ' has-error' : '' }}">
                                            {{ Form::label('site_meta_title_en', 'საიტის მეტა აღწერა ინგლისურად', ['class' => 'font-helvetica']) }}
                                            {{ Form::text('site_meta_title_en', $datas['site_meta_title_en'], ['class' => 'input w-full border mt-2 col-span-2']) }}
                                            @if ($errors->has('site_meta_title_en'))
                                                <span class="help-block">
                                            {{ $errors->first('site_meta_title_en') }}
                                        </span>
                                            @endif
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
                    </div>
                </div>
                <div class="tab-content__pane  {{session('contact-update') ? 'active' : ''}} {{$contactActive}}" id="contact">
                    <div class="pr-1">
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="intro-y col-span-12 lg:col-span-8">
                                <div class="intro-y box p-5">
                                    {!! Form::open(['url' => route('contactUpdate')]) !!}
                                    <div class="sm:grid grid-cols-2 gap-2 mb-4">
                                        <div class="relative mt-4 {{ $errors->has('admin_email') ? ' has-error' : '' }}">
                                            {{ Form::label('admin_email', 'ადმინის ელ-ფოსტა', ['class' => 'font-helvetica']) }}
                                            {{ Form::text('admin_email', $datas['admin_email'], ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                                            @if ($errors->has('admin_email'))
                                                <span class="help-block">
                                                          {{ $errors->first('admin_email') }}
                                                     </span>
                                            @endif
                                        </div>
                                        <div class="relative mt-4 {{ $errors->has('contact_email') ? ' has-error' : '' }}">
                                            {{ Form::label('contact_email', 'საკონტაქტო ელ-ფოსტა', ['class' => 'font-helvetica']) }}
                                            {{ Form::text('contact_email', $datas['contact_email'], ['class' => 'input w-full border mt-2 col-span-2']) }}
                                            @if ($errors->has('contact_email'))
                                                <span class="help-block">
                                            {{ $errors->first('contact_email') }}
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="sm:grid grid-cols-2 gap-2 mb-4">
                                        <div class="relative mt-4 {{ $errors->has('support_email') ? ' has-error' : '' }}">
                                            {{ Form::label('support_email', 'ტექნიკური მხარდაჭერის ელ-ფოსტა', ['class' => 'font-helvetica']) }}
                                            {{ Form::text('support_email', $datas['support_email'], ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                                            @if ($errors->has('support_email'))
                                                <span class="help-block">
                                            {{ $errors->first('support_email') }}
                                        </span>
                                            @endif
                                        </div>
                                        <div class="relative mt-4 {{ $errors->has('phone') ? ' has-error' : '' }}">
                                            {{ Form::label('phone', 'ტელეფონის ნომერი', ['class' => 'font-helvetica']) }}
                                            {{ Form::text('phone', $datas['phone'], ['class' => 'input w-full border mt-2 col-span-2']) }}
                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                            {{ $errors->first('phone') }}
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="sm:grid grid-cols-2 gap-2 mb-4">
                                        <div class="relative mt-4 {{ $errors->has('address_ge') ? ' has-error' : '' }}">
                                            {{ Form::label('address_ge', 'კომპანიის მისამართი ქართულად', ['class' => 'font-helvetica']) }}
                                            {{ Form::text('address_ge', $datas['address_ge'], ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                                            @if ($errors->has('address_ge'))
                                                <span class="help-block">
                                            {{ $errors->first('address_ge') }}
                                        </span>
                                            @endif
                                        </div>
                                        <div class="relative mt-4 {{ $errors->has('address_en') ? ' has-error' : '' }}">
                                            {{ Form::label('address_en', 'კომპანიის მისამართი ინგლისურად', ['class' => 'font-helvetica']) }}
                                            {{ Form::text('address_en', $datas['address_en'], ['class' => 'input w-full border mt-2 col-span-2']) }}
                                            @if ($errors->has('address_en'))
                                                <span class="help-block">
                                            {{ $errors->first('address_en') }}
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="relative mt-3">
                                        <button type="submit" name="general_submit"
                                                class="button w-25 bg-theme-1 text-white font-helvetica">რედაქტირება
                                        </button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content__pane {{session('social-update') ? 'active' : ''}} {{$socialActive}}" id="social">
                    <div class="pr-1">
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="intro-y col-span-12 lg:col-span-8">
                                <div class="intro-y box p-5">
                                    {!! Form::open(['url' => route('socialUpdate')]) !!}
                                    <div class="sm:grid grid-cols-2 gap-2 mb-4">
                                        <div class="relative mt-4 {{ $errors->has('facebook_url') ? ' has-error' : '' }}">
                                            {{ Form::label('facebook_url', 'Facebook', ['class' => 'font-helvetica']) }}
                                            {{ Form::text('facebook_url', $datas['facebook_url'], ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                                            @if ($errors->has('facebook_url'))
                                                <span class="help-block">
                                                          {{ $errors->first('facebook_url') }}
                                                     </span>
                                            @endif
                                        </div>
                                        <div class="relative mt-4 {{ $errors->has('instagram_url') ? ' has-error' : '' }}">
                                            {{ Form::label('instagram_url', 'Instagram', ['class' => 'font-helvetica']) }}
                                            {{ Form::text('instagram_url', $datas['instagram_url'], ['class' => 'input w-full border mt-2 col-span-2']) }}
                                            @if ($errors->has('instagram_url'))
                                                <span class="help-block">
                                            {{ $errors->first('instagram_url') }}
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="sm:grid grid-cols-2 gap-2 mb-4">
                                        <div class="relative mt-4 {{ $errors->has('youtube_url') ? ' has-error' : '' }}">
                                            {{ Form::label('youtube_url', 'ტექნიკური მხარდაჭერის ელ-ფოსტა', ['class' => 'font-helvetica']) }}
                                            {{ Form::text('youtube_url', $datas['youtube_url'], ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                                            @if ($errors->has('youtube_url'))
                                                <span class="help-block">
                                            {{ $errors->first('youtube_url') }}
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="relative mt-3">
                                        <button type="submit" name="social_submit"
                                                class="button w-25 bg-theme-1 text-white font-helvetica">რედაქტირება
                                        </button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-content__pane {{session('mailer-update') ? 'active' : ''}} {{$mailerActive}}" id="mailer">
                    <div class="pr-1">
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="intro-y col-span-12 lg:col-span-8">
                                <div class="intro-y box p-5">
                                    {!! Form::open(['route' => 'settingSmtp', 'method' => 'POST']) !!}
                                    <div class="sm:grid grid-cols-3 gap-3 mb-4">
                                        <div class="relative mt-4 {{ $errors->has('smtp_host') ? ' has-error' : '' }}">
                                            {{ Form::label('smtp_host', 'SMTP host', ['class' => 'font-helvetica']) }}
                                            {{ Form::text('smtp_host', $datas['smtp_host'], ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                                            @if ($errors->has('smtp_host'))
                                                <span class="help-block">
                                                          {{ $errors->first('smtp_host') }}
                                                     </span>
                                            @endif
                                        </div>
                                        <div class="relative mt-4 {{ $errors->has('smtp_port') ? ' has-error' : '' }}">
                                            {{ Form::label('smtp_port', 'Port', ['class' => 'font-helvetica']) }}
                                            {{ Form::text('smtp_port', $datas['smtp_port'], ['class' => 'input w-full border mt-2 col-span-2']) }}
                                            @if ($errors->has('smtp_port'))
                                                <span class="help-block">
                                            {{ $errors->first('smtp_port') }}
                                        </span>
                                            @endif
                                        </div>
                                        <div class="relative mt-4 {{ $errors->has('smtp_encrypted') ? ' has-error' : '' }}">
                                            {{ Form::label('smtp_encrypted', 'Encrypted', ['class' => 'font-helvetica']) }}
                                            {{ Form::text('smtp_encrypted', $datas['smtp_encrypted'], ['class' => 'input w-full border mt-2 col-span-2']) }}
                                            @if ($errors->has('smtp_encrypted'))
                                                <span class="help-block">
                                            {{ $errors->first('smtp_encrypted') }}
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="sm:grid grid-cols-2 gap-2 mb-4">
                                        <div class="relative mt-4 {{ $errors->has('smtp_email') ? ' has-error' : '' }}">
                                            {{ Form::label('smtp_email', 'Email', ['class' => 'font-helvetica']) }}
                                            {{ Form::text('smtp_email', $datas['smtp_email'], ['class' => 'input w-full border mt-2 col-span-2', 'no']) }}
                                            @if ($errors->has('smtp_email'))
                                                <span class="help-block">
                                            {{ $errors->first('smtp_email') }}
                                        </span>
                                            @endif
                                        </div>
                                        <div class="relative mt-4 {{ $errors->has('smtp_password') ? ' has-error' : '' }}">
                                            {{ Form::label('smtp_password', 'Email Password', ['class' => 'font-helvetica']) }}
                                            {{ Form::text('smtp_password', $datas['smtp_password'], ['class' => 'input w-full border mt-2 col-span-2']) }}
                                            @if ($errors->has('smtp_password'))
                                                <span class="help-block">
                                            {{ $errors->first('smtp_password') }}
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="relative mt-4 {{ $errors->has('smtp_subject') ? ' has-error' : '' }}">
                                        {{ Form::label('smtp_subject', 'Subject', ['class' => 'font-helvetica']) }}
                                        {{ Form::text('smtp_subject', $datas['smtp_subject'], ['class' => 'input w-full border mt-2 col-span-2']) }}
                                        @if ($errors->has('smtp_subject'))
                                            <span class="help-block">
                                            {{ $errors->first('smtp_subject') }}
                                        </span>
                                        @endif
                                    </div>

                                    <div class="relative mt-3">
                                        <button type="submit" name="smtp_add_submit"
                                                class="button w-25 bg-theme-1 text-white font-helvetica">რედაქტირება
                                        </button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

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