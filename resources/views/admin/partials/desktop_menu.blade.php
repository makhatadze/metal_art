<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{ url('dist/images/logo.svg') }}">
        <span class="hidden xl:block text-white text-lg ml-3"> CRM<span class="font-medium"> DIMOND</span> </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{route('siteIndex')}}" class="side-menu" data-menu="home">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> მთავარი გვერდი </div>
            </a>
         </li>
        <li>
            <a href="javascript:;" class="side-menu" data-menu="shop">
                <div class="side-menu__icon"> <i data-feather="shopping-cart"></i> </div>
                <div class="side-menu__title"> ონლაინ მაღაზია <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="data-menu-item" data-menu="shop">
                <li>
                    <a href="{{route('productIndex')}}" class="side-menu custom-nav-item">
                        <div class="side-menu__icon"> <i data-feather="circle" style="width: 15px; height: 15px;"></i> </div>
                        <div class="side-menu__title"> პროდუქცია </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('dealIndex')}}" class="side-menu custom-nav-item">
                        <div class="side-menu__icon"> <i data-feather="circle" style="width: 15px; height: 15px;"></i> </div>
                        <div class="side-menu__title"> გარიგების ტიპი </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu" data-menu="vehicle">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title"> მანქანის დეტალები <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="data-menu-item" data-menu="vehicle">
                <li>
                    <a href="{{route('brandIndex')}}" class="side-menu custom-nav-item">
                        <div class="side-menu__icon"> <i data-feather="circle" style="width: 15px; height: 15px;"></i> </div>
                        <div class="side-menu__title"> მწარმოებელი </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('modelIndex')}}" class="side-menu custom-nav-item">
                        <div class="side-menu__icon"> <i data-feather="circle" style="width: 15px; height: 15px;"></i> </div>
                        <div class="side-menu__title"> მოდელები </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('categoryIndex')}}" class="side-menu custom-nav-item">
                        <div class="side-menu__icon"> <i data-feather="circle" style="width: 15px; height: 15px;"></i> </div>
                        <div class="side-menu__title"> კატეგორიები </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('fuelIndex')}}" class="side-menu custom-nav-item">
                        <div class="side-menu__icon"> <i data-feather="circle" style="width: 15px; height: 15px;"></i> </div>
                        <div class="side-menu__title"> საწვავი </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('conditionIndex')}}" class="side-menu custom-nav-item">
                        <div class="side-menu__icon"> <i data-feather="circle" style="width: 15px; height: 15px;"></i> </div>
                        <div class="side-menu__title"> მდგომარეობა </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('transmissionIndex')}}" class="side-menu custom-nav-item">
                        <div class="side-menu__icon"> <i data-feather="circle" style="width: 15px; height: 15px;"></i> </div>
                        <div class="side-menu__title"> გადაცემათა კოლოფი </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('engineIndex')}}" class="side-menu custom-nav-item">
                        <div class="side-menu__icon"> <i data-feather="circle" style="width: 15px; height: 15px;"></i> </div>
                        <div class="side-menu__title"> ძრავის ტიპი </div>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="side-menu" data-menu="settings">
                <div class="side-menu__icon"> <i data-feather="settings"></i> </div>
                <div class="side-menu__title"> პარამეტრები <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="data-menu-item" data-menu="settings">
                <li>
                    <a href="{{route('settingsIndex')}}" class="side-menu custom-nav-item">
                        <div class="side-menu__icon"> <i data-feather="circle" style="width: 15px; height: 15px;"></i> </div>
                        <div class="side-menu__title">საიტის პარამეტრები</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('pageIndex')}}" class="side-menu custom-nav-item">
                        <div class="side-menu__icon"> <i data-feather="circle" style="width: 15px; height: 15px;"></i> </div>
                        <div class="side-menu__title"> გვერდები </div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
