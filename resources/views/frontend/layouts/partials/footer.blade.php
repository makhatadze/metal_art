<?php

use App\Models\Setting;
$protocolKey = 'site_meta_title_'.app()->getLocale();
$addressKey = 'address_'.app()->getLocale();

$phone = Setting::where(['key' => 'phone'])->first();
$address = Setting::where(['key' => $addressKey])->first();
$protoc = Setting::where(['key' => $protocolKey])->first();
$facebookUrl = Setting::where(['key' => 'facebook_url'])->first();
$linkedinUrl = Setting::where(['key' => 'linkedin'])->first();
$instagramUrl = Setting::where(['key' => 'instagram_url'])->first();

?>
<footer id="footer">
    <div class="footer__circle"></div>

    <div class="container">
        <div class="footer-wrapper">

            <div class="footer__info-col">

                <div class="footer__site-logo">
                    <img src="{{url('frontend-assets/img/logos/site-logo.svg')}}" alt="">
                </div>
                <p class="footer__addres">{{$address->value}}
                </p>
                <p class="footer__phone">
                    {{$phone->value}}
                </p>

                <div class="footer__soc-links">
                    <a href="{{$linkedinUrl->value}}" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="31.8" height="31.8" viewBox="0 0 31.8 31.8">
                            <path id="Path_18" data-name="Path 18" d="M15.9,0A15.9,15.9,0,1,0,31.8,15.9,15.9,15.9,0,0,0,15.9,0ZM11.28,24.036H7.407V12.386H11.28ZM9.344,10.8H9.318a2.018,2.018,0,1,1,.051-4.03,2.019,2.019,0,1,1-.025,4.03Zm15.9,13.241H21.371V17.8c0-1.566-.561-2.635-1.962-2.635a2.12,2.12,0,0,0-1.987,1.416,2.652,2.652,0,0,0-.127.945v6.506H13.423s.051-10.557,0-11.65H17.3v1.65a3.844,3.844,0,0,1,3.49-1.923c2.548,0,4.458,1.665,4.458,5.243Zm0,0"/>
                        </svg>
                    </a>
                    <a href="{{$instagramUrl->value}}" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32.19" height="32.19" viewBox="0 0 32.19 32.19">
                            <path id="Path_19" data-name="Path 19" d="M16.095,0A16.095,16.095,0,1,0,32.189,16.095,16.1,16.1,0,0,0,16.095,0Zm7.349,12.549q.011.238.011.477A10.439,10.439,0,0,1,12.943,23.537h0a10.456,10.456,0,0,1-5.662-1.659,7.514,7.514,0,0,0,.881.051,7.412,7.412,0,0,0,4.588-1.581A3.7,3.7,0,0,1,9.3,17.781a3.682,3.682,0,0,0,1.668-.063A3.7,3.7,0,0,1,8,14.1c0-.017,0-.032,0-.047a3.669,3.669,0,0,0,1.673.462A3.7,3.7,0,0,1,8.534,9.58a10.488,10.488,0,0,0,7.615,3.86,3.7,3.7,0,0,1,6.3-3.369,7.409,7.409,0,0,0,2.346-.9,3.709,3.709,0,0,1-1.625,2.043,7.368,7.368,0,0,0,2.121-.582,7.507,7.507,0,0,1-1.848,1.917Zm0,0" transform="translate(0.001)"/>
                        </svg>
                    </a>
                    <a href="{{$facebookUrl->value}}" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32.685" height="32.184" viewBox="0 0 32.685 32.184">
                            <g id="Group_1631" data-name="Group 1631" transform="translate(-0.001 -0.001)">
                                <path id="Path_20" data-name="Path 20" d="M298.451,508.668q-3.784.617-7.6,1.137Q294.667,509.285,298.451,508.668Zm0,0" transform="translate(-265.765 -480.424)"/>
                                <path id="Path_21" data-name="Path 21" d="M302.958,507.793c-1.206.222-2.412.425-3.618.633C300.546,508.218,301.752,508.015,302.958,507.793Zm0,0" transform="translate(-271.594 -480.584)"/>
                                <path id="Path_22" data-name="Path 22" d="M286.513,510.34q-4.429.5-8.9.878Q282.08,510.843,286.513,510.34Zm0,0" transform="translate(-253.854 -480.119)"/>
                                <path id="Path_23" data-name="Path 23" d="M290.715,509.738c-1.418.189-2.846.365-4.269.531C287.868,510.1,289.3,509.928,290.715,509.738Zm0,0" transform="translate(-259.772 -480.229)"/>
                                <path id="Path_24" data-name="Path 24" d="M309.861,506.41c-1.063.226-2.13.453-3.2.67C307.731,506.863,308.8,506.637,309.861,506.41Zm0,0" transform="translate(-278.266 -480.837)"/>
                                <path id="Path_25" data-name="Path 25" d="M327.063,502.113c-.859.245-1.719.476-2.578.716C325.344,502.589,326.2,502.358,327.063,502.113Zm0,0" transform="translate(-294.696 -481.623)"/>
                                <path id="Path_26" data-name="Path 26" d="M321.868,503.543c-.933.245-1.871.494-2.809.73Q320.465,503.92,321.868,503.543Zm0,0" transform="translate(-289.723 -481.361)"/>
                                <path id="Path_27" data-name="Path 27" d="M315.051,505.254c-.989.231-1.987.448-2.985.67C313.064,505.7,314.062,505.485,315.051,505.254Zm0,0" transform="translate(-283.236 -481.049)"/>
                                <path id="Path_28" data-name="Path 28" d="M278.267,511.09q-2.391.2-4.787.36Q275.879,511.291,278.267,511.09Zm0,0" transform="translate(-247.785 -479.982)"/>
                                <path id="Path_29" data-name="Path 29" d="M32.185,16.092A16.092,16.092,0,1,0,16.092,32.185h.283V19.654H12.918V15.625h3.457V12.66c0-3.439,2.1-5.31,5.167-5.31a28.461,28.461,0,0,1,3.1.158V11.1H22.526c-1.669,0-1.992.793-1.992,1.957v2.566h3.99L24,19.654H20.53V31.563A16.1,16.1,0,0,0,32.185,16.092Zm0,0"/>
                                <path id="Path_30" data-name="Path 30" d="M274.381,511.43q-4.727.305-9.49.471Q269.652,511.742,274.381,511.43Zm0,0" transform="translate(-242.018 -479.919)"/>
                                <path id="Path_31" data-name="Path 31" d="M265.531,511.836q-2.509.083-5.027.125Q263.02,511.919,265.531,511.836Zm0,0" transform="translate(-235.626 -479.845)"/>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>


            <div class="footer__category-col">
                <h2 class="footer__category-heading">
                    {{__('app.categories')}}
                </h2>

                <a href="{{route('site')}}" class="footer__category-link">
                    {{__('app.site')}}
                </a>
                <a href="{{route('catalogIndex')}}" class="footer__category-link">
                    {{__('app.catalog')}}
                </a>
                <a href="{{route('aboutIndex')}}" class="footer__category-link">
                    {{__('app.about-us')}}
                </a>
                <a href="{{route('contactIndex')}}" class="footer__category-link">
                    {{__('app.contact')}}
                </a>
            </div>



            <div class="footer__map-col">
                <div class="footer__map-col-overlay"></div>
                <iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=tbilisi&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>

        </div>

        <div class="footer__copy">
            {{$protoc->value}}
        </div>
    </div>

</footer>
