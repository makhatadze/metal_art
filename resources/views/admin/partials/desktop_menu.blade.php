<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img class="w-24"
             src="{{url('frontend-assets/img/logos/site-logo.png')}}">
        <span class="hidden xl:block text-white text-lg ml-3"> METAL<span class="font-medium"> ART</span> </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{route('siteIndex')}}" class="side-menu" data-menu="home">
                <div class="side-menu__icon"><i data-feather="home"></i></div>
                <div class="side-menu__title"> მთავარი გვერდი</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="side-menu" data-menu="shop">
                <div class="side-menu__icon"><i data-feather="shopping-cart"></i></div>
                <div class="side-menu__title">მაღაზია <i data-feather="chevron-down"
                                                                 class="side-menu__sub-icon"></i></div>
            </a>
            <ul class="data-menu-item" data-menu="shop">
                <li>
                    <a href="{{route('productIndex')}}" class="side-menu custom-nav-item">
                        <div class="side-menu__icon"><i data-feather="circle" style="width: 15px; height: 15px;"></i>
                        </div>
                        <div class="side-menu__title"> პროდუქცია</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('categoryIndex')}}" class="side-menu custom-nav-item">
                        <div class="side-menu__icon"><i data-feather="circle" style="width: 15px; height: 15px;"></i>
                        </div>
                        <div class="side-menu__title"> კატეგორიები</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('sizeIndex')}}" class="side-menu custom-nav-item">
                        <div class="side-menu__icon"><i data-feather="circle" style="width: 15px; height: 15px;"></i>
                        </div>
                        <div class="side-menu__title"> ზომები</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('colorIndex')}}" class="side-menu custom-nav-item">
                        <div class="side-menu__icon"><i data-feather="circle" style="width: 15px; height: 15px;"></i>
                        </div>
                        <div class="side-menu__title"> ფერები</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu" data-menu="settings">
                <div class="side-menu__icon"><i data-feather="settings"></i></div>
                <div class="side-menu__title"> პარამეტრები <i data-feather="chevron-down"
                                                              class="side-menu__sub-icon"></i></div>
            </a>
            <ul class="data-menu-item" data-menu="settings">
                <li>
                    <a href="{{route('settingsIndex')}}" class="side-menu custom-nav-item">
                        <div class="side-menu__icon"><i data-feather="circle" style="width: 15px; height: 15px;"></i>
                        </div>
                        <div class="side-menu__title">საიტის პარამეტრები</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('pageIndex')}}" class="side-menu custom-nav-item">
                        <div class="side-menu__icon"><i data-feather="circle" style="width: 15px; height: 15px;"></i>
                        </div>
                        <div class="side-menu__title"> გვერდები</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
