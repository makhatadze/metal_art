<!-- About us modal -->
<?php
use App\Models\Page;
use App\Models\Setting;

$page = Page::where(['slug' => 'about-us'])->first();
$phone = Setting::where(['key' => 'phone'])->first();
$addressKey = 'address_'.app()->getLocale();
$address = Setting::where(['key' => $addressKey])->first();
?><!-- footer-->
<footer id="footer">
    <div class="footer-wrap">

        <h1 class="footer-heading">metal art</h1>
        <div class="footer-info">
            <p class="location">
                <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d95278.13240907624!2d44.768813263292024!3d41.73256609181533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40440cd7e64f626b%3A0x61d084ede2576ea3!2sTbilisi!5e0!3m2!1sen!2sge!4v1597843332216!5m2!1sen!2sge" target="_blank" >{{$address->value}}</a></p>
            <p class="phone"> <a href="tel:{{$phone->value}}">{{$phone->value}}</a></p>
            <p class="copyright"> &copy; 2020 MetalArt <br><br> <b>Created By</b> <a href="https://insite.international/en/" target="blank" style="margin: 0 auto; width: 100%; float: >"><img src="{{ url('insite_logo.png') }}" width="100px" style="margin: 15px auto;"></a></p>
        </div>

    </div>
</footer>