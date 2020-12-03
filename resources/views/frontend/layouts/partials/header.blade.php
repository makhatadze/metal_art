<!-- start-->
<header  class="header">

    <nav class="nav">
        <a href="{{route('site')}}" class="brand-logo">
            <img src="{{url('frontend-assets/img/logos/site-logo.png')}}" alt="logo">
        </a>

        <div class="dropdown-btns">
            <svg id="menu" xmlns="http://www.w3.org/2000/svg" width="22.74" height="15.16" viewBox="0 0 22.74 15.16">
                <path id="Icon_material-menu" fill="#2E393E" d="M4.5 24.16h22.74v-2.527H4.5zm0-6.317h22.74v-2.526H4.5zM4.5 9v2.527h22.74V9z" data-name="Icon material-menu" transform="translate(-4.5 -9)"/>
            </svg>
            <svg id="close" enable-background="new 0 0 386.667 386.667" height="512" viewBox="0 0 386.667 386.667" width="512" xmlns="http://www.w3.org/2000/svg"><path fill="#2E393E" d="m386.667 45.564-45.564-45.564-147.77 147.769-147.769-147.769-45.564 45.564 147.769 147.769-147.769 147.77 45.564 45.564 147.769-147.769 147.769 147.769 45.564-45.564-147.768-147.77z"/></svg>
        </div>

        <ul class="nav-navbar">
            <li class="navbar-item">
                <a href="{{route('site')}}" class="navbar-link {{$page->slug == 'home' ? 'active': ''}}" class="navbar-link active">{{__('app.home')}}</a>
            </li>
            <li class="navbar-item">
                <a class="navbar-link">{{__('app.about_us')}}</a>
            </li>
            <li class="navbar-item">
                <a href="{{route('productsIndex')}}" class="navbar-link {{($page->slug == 'products' || $page->slug == 'details') ? 'active': ''}}">{{__('app.products')}}</a>
            </li>
            <li class="navbar-item">
                <a href="{{route('contactIndex')}}" class="navbar-link {{$page->slug == 'contact-us' ? 'active': ''}}">{{__('app.contact_us')}}</a>
            </li>
        </ul>

        <div class="lang-bar">
            <a href="{{ LaravelLocalization::getLocalizedURL('ge') }}" class="{{app()->getLocale() == 'ge' ? 'active' : ''}}">
                <img src="{{url('frontend-assets/img/logos/georgia_1.svg')}}" alt="">
            </a>
            <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="{{app()->getLocale() == 'en' ? 'active' : ''}}">
                <img src="{{url('frontend-assets/img/logos/uk.svg')}}" alt="">
            </a>
            <a href="{{ LaravelLocalization::getLocalizedURL('ru') }}" class="{{app()->getLocale() == 'ru' ? 'active' : ''}}">
                <img src="{{url('frontend-assets/img/logos/russia.svg')}}" alt="">
            </a>
        </div>

    </nav>

</header>