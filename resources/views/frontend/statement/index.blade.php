@extends('frontend.layouts.layout')
@section('content')
    @include('frontend.layouts.partials.detail-header')
    @include('frontend.layouts.partials.modal')


    <!-- end of  animation on subbmit request -->
    <style>
        .select2-container {
            width: 250px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: black;
            font-size: 23px;
        }

        .full_name {
            margin-top: 15px;
        }

        .select-header {
            margin-bottom: 10px;
        }
    </style>
    <main>
        <!-- section 1 -  contact main  -->
        <section id="contact-main">

            <div class="container">
                <form class="statement-section__form" onsubmit="return false;">
                    <h1 class="details__form-heading">
                        {{__('app.fill_out')}}
                        <img src="{{url('frontend-assets/img/logos/i-document-orang.svg')}}" alt="">
                    </h1>


                    <div class="details__form-input-grid">
                        <input type="text" placeholder="{{__('app.first_name')}}" name="statement_first_name" required>
                        <input type="text" placeholder="{{__('app.last_name')}}" name="statement_last_name" required>
                        <input type="number" placeholder="{{__('app.mobile_phone')}}" name="statement_phone" required>
                        <input type="text" placeholder="{{__('app.address')}}" name="statement_address" required>
                        <input type="number" placeholder="{{__('app.personal_id')}}" name="statement_personal_id" required>
                        <input type="text" placeholder="{{__('app.url')}}" name="statement_url">
                        <div>
                            <p class="contact__form-p select-header">{{__('app.choose_category')}}</p>

                            <select name="statement_category" class="select2 lizing" required>
                                <option value="ლომბარდი">ლომბარდი</option>
                                <option value="ლიზინგი">ლიზინგი</option>
                                <option value="განბაჟება">განბაჟება</option>
                                <option value="პორტირება">პორტირება</option>
                            </select>

                        </div>
                        <input type="file" id="file1" name="files[]" accept=".jpg,.jpeg,.png" multiple/>

                    </div>
                    <div id="file-container" class="statement-container">
                        <div id="statement-preview"></div>
                    </div>


                    <button class="details__form-btn" id="sendStatement">{{__('app.submit_application')}}</button>

                </form>


            </div>

        </section>

    </main>

@endsection
