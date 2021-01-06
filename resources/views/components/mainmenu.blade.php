<body class="cat__config--horizontal cat__menu-left--colorful cat__config--superclean">

<nav class="cat__menu-left">
    <div class="cat__menu-left__lock cat__menu-left__action--menu-toggle">
        <div class="cat__menu-left__pin-button">
            <div><!-- --></div>
        </div>
    </div>
    <div class="cat__menu-left__logo">
        <a href="{{url('admin') }}">
            <img src="{!! asset('/dist/modules/dummy-assets/common/img/logo-admin.png') !!}"/>
        </a>
    </div>
    <div class="cat__menu-left__inner">
        <ul class="cat__menu-left__list cat__menu-left__list--root">
        <!--<li class="cat__menu-left__item">
                <a href="{{ url('users')}}" class="cat__menu-right__action--menu-toggle">
                    <span class="cat__menu-left__icon icmn-users cat__core__spin-delayed--pseudo-selector"></span>
                    Users
                </a>
            </li>-->
            <li class="cat__menu-left__item cat__menu-left__submenu">
                <a href="javascript: void(0);">
                    <span class="cat__menu-left__icon icmn-calendar"></span>
                    Dịch vụ
                </a>
                <ul class="cat__menu-left__list">
                    <li class="cat__menu-left__item">
                        <a href="{{ route("typeService")}}">
                            <span class="cat__menu-left__icon icmn-file-text2"></span>
                           Loại Dịch vụ
                        </a>
                    </li>

                    <li class="cat__menu-left__item">
                        <a href="{{ route("process")}}">
                            <span class="cat__menu-left__icon icmn-file-text2"></span>
                            Liệu Trình
                        </a>
                    </li>

                    <li class="cat__menu-left__item">
                        <a href="{{ route("service")}}">
                            <span class="cat__menu-left__icon icmn-file-text2"></span>
                            Dịch vụ
                        </a>
                    </li>

                    <li class="cat__menu-left__item">
                        <a href="{{ route("admin.rate")}}">
                            <span class="cat__menu-left__icon icmn-file-text2"></span>
              Đánh giá
                        </a>
                    </li>

                </ul>
            </li>
            <li class="cat__menu-left__item cat__menu-left__submenu">
                <a href="javascript: void(0);">
                    <span class="cat__menu-left__icon icmn-cart"></span>
                   Kinh doanh
                </a>
                <ul class="cat__menu-left__list">
                    <li class="cat__menu-left__item">
                        <a href="{{ route('admin.booking')}}">
                            <span class="cat__menu-left__icon icmn-calendar"></span>
                            Lịch Hẹn
                        </a>
                    </li>

                    <li class="cat__menu-left__item">
                        <a href="{{ route('employee.schedule')}}">
                            <span class="cat__menu-left__icon icmn-calendar"></span>
                            Lịch Làm Của Nhân Viên
                        </a>
                    </li>
                    <li class="cat__menu-left__item">
                        <a href="{{ route('admin.order')}}">
                            <span class="cat__menu-left__icon icmn-cart"></span>
                           Đơn hàng
                        </a>
                    </li>
                </ul>
            </li>
            <li class="cat__menu-left__item cat__menu-left__submenu">
                <a href="javascript: void(0);">
                    <span class="cat__menu-left__icon icmn-user"></span>
                    Tài Khoản
                </a>
                <ul class="cat__menu-left__list">
                    <li class="cat__menu-left__item">
                        <a href="{{ route("employee")}}">
                            <span class="cat__menu-left__icon icmn-user-tie"></span>
                         Nhân Viên
                        </a>
                    </li>
                    <li class="cat__menu-left__item">
                        <a href="{{ route("customer")}}">
                            <span class="cat__menu-left__icon icmn-user"></span>
                            Khách Hàng
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
