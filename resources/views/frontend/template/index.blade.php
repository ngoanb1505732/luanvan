<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7"><![endif]-->
<!--[if IE 8]>
<html class="ie ie8"><![endif]-->
<!--[if IE 9]>
<html class="ie ie9"><![endif]-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    <!-- Fonts-->
    <link rel="stylesheet" href="{{url("frontend")}}/css/font-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900"
        rel="stylesheet">
    <link rel="stylesheet" href="{{url("frontend")}}/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url("frontend")}}/plugins/ps-icon/style.css">
    <!-- CSS Library-->
    <link rel="stylesheet" href="{{url("frontend")}}/plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url("frontend")}}/plugins/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="{{url("frontend")}}/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="{{url("frontend")}}/plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="{{url("frontend")}}/plugins/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{url("frontend")}}/plugins/Magnific-Popup/dist/magnific-popup.css">
    <link rel="stylesheet" href="{{url("frontend")}}/plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="{{url("frontend")}}/plugins/revolution/css/settings.css">
    <link rel="stylesheet" href="{{url("frontend")}}/plugins/revolution/css/layers.css">
    <link rel="stylesheet" href="{{url("frontend")}}/plugins/revolution/css/navigation.css">
    <!-- Custom-->
    <link rel="stylesheet" href="{{url("frontend")}}/css/style.css">
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script type="text/javascript" src="{{url("/")}}/plugins/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="{{url("/")}}/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{url("/")}}/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script type="text/javascript" src="{{url("/")}}/plugins/owl-carousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{{url("/")}}/plugins/gmap3.min.js"></script>
    <script type="text/javascript" src="{{url("/")}}/plugins/imagesloaded.pkgd.js"></script>
    <script type="text/javascript" src="{{url("/")}}/plugins/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="{{url("/")}}/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="{{url("/")}}/plugins/jquery.matchHeight-min.js"></script>
    <script type="text/javascript" src="{{url("/")}}/plugins/slick/slick/slick.min.js"></script>
    <script type="text/javascript" src="{{url("/")}}/plugins/elevatezoom/jquery.elevatezoom.js"></script>
    <script type="text/javascript" src="{{url("/")}}/plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="{{url("/")}}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB"></script>
    <script type="text/javascript" src="{{url("/")}}/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript"
            src="{{url("/")}}/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript"
            src="{{url("/")}}/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script type="text/javascript"
            src="{{url("/")}}/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript"
            src="{{url("/")}}/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript"
            src="{{url("/")}}/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript"
            src="{{url("/")}}/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript"
            src="{{url("/")}}/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <!-- Custom scripts-->
    <script type="text/javascript" src="{{url("frontend")}}/js/main.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<!--[if IE 7]>
<body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 8]>
<body class="ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 9]>
<body class="ie9 lt-ie10"><![endif]-->
<body class="ps-loading">
<div class="header--sidebar"></div>
<header class="header">
    <div class="header__top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                    <p>Spa Duyên Cần Thơ - Hotline: 804-377-3580 </p>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="header__actions">

                        @if(Session::has('username'))
                            <div class="btn-group ps-dropdown" onclick="showDropdown(this)">
                                <a class="dropdown-toggle" href="#"
                                   data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="true">{{ Session::get('username')}}<i
                                        class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route("customer.updateInfo")}}">Thông tin tài khoản</a></li>
                                    <li><a href="{{route("customer.bookingHistory","false")}}">Lịch hẹn</a></li>
                                    <li><a href="{{route("customer.historyOrder")}}">Hoá đơn</a></li>
                                    <li><a href="{{route("customer.logout")}}">Đăng xuất</a></li>
                                </ul>
                            </div>
                        @else
                            <a href="{{route("customer.login")}}">Đăng nhập</a>
                            <div class="header__actions">
                                <a href="{{route("customer.register")}}">Đăng ký</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <nav class="navigation">
            <div class="container-fluid">
                <div class="navigation__column left">
                    <div class="header__logo"><a class="ps-logo" href="{{url("/")}}"><img style="height: 200px"
                                                                                          src="{{url("/frontend")}}/images/logo.jpg"
                                                                                          alt=""></a></div>
                </div>
                <div class="navigation__column center">
                    <ul class="main-menu menu">
                        <li class="menu-item menu-item dropdown"><a href="{{url("/")}}">Trang chủ</a>
                        </li>
                        <li class="menu-item menu-item-has-children has-mega-menu"><a href="#">Dịch vụ</a>
                            <div class="mega-menu">
                                <div class="mega-wrap">
                                    <div class="mega-column">
                                        <ul class="mega-item mega-features">
                                            <li><a href="{{url("/")}}">Thông tin dịch vụ</a></li>
                                            <li><a href="{{url("/")}}">Thời gian mở cửa</a></li>
                                            <li><a href="{{url("/")}}">Nhân viên</a></li>
                                        </ul>
                                    </div>
                                    @foreach($typeServices as $item)
                                        <div class="mega-column">
                                            <h4 class="mega-heading"><a
                                                    href="{{route("front-end.typeService.load",$item->loai_dich_vu_id)}}">{{$item->ten_loai_dich_vu}}</a>
                                            </h4>
                                            <ul class="mega-item">
                                                @foreach($item->dichVu as $dichVu)
                                                    <li>
                                                        <a href="{{route("front-end.service.load",$dichVu->dich_vu_id)}}">{{$dichVu->ten_dich_vu}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        <li class="menu-item"><a href="#">Khuyến mãi</a></li>
                        <li class="menu-item"><a href="#">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="navigation__column right">
                    <form class="ps-search--header" action="do_action" method="post">
                        <input class="form-control" type="text" placeholder="Search Product…">
                        <button><i class="ps-icon-search"></i></button>
                    </form>
                    <div class="ps-cart" id="ps-cart">
                        <a class="ps-cart__toggle" href="#"><span><i>0</i></span><i
                                class="ps-icon-shopping-cart"></i></a>
{{--                        <div class="ps-cart__listing">--}}
{{--                            <div class="ps-cart__content">--}}
{{--                                <div class="ps-cart-item">--}}
{{--                                    <a class="ps-cart-item__close" href="#"></a>--}}
{{--                                    <div class="ps-cart-item__thumbnail">--}}
{{--                                        <a href="product-detail.html"></a>--}}
{{--                                        <img src="images/cart-preview/1.jpg" alt=""></div>--}}
{{--                                    <div class="ps-cart-item__content">--}}
{{--                                        <a class="ps-cart-item__title" href="product-detail.html">Chăm sóc tóc</a>--}}
{{--                                        <p>--}}
{{--                                            <span>Thời gian:<i>30 phút</i></span>--}}
{{--                                            <span>Giá:<i>300000 VND</i></span>--}}
{{--                                    </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="ps-cart-item">--}}
{{--                                    <a class="ps-cart-item__close" href="#"></a>--}}
{{--                                    <div class="ps-cart-item__thumbnail">--}}
{{--                                        <a href="product-detail.html"></a>--}}
{{--                                        <img src="images/cart-preview/1.jpg" alt=""></div>--}}
{{--                                    <div class="ps-cart-item__content">--}}
{{--                                        <a class="ps-cart-item__title" href="product-detail.html">Chăm sóc da</a>--}}
{{--                                        <p>--}}
{{--                                            <span>Thời gian:<i>60 phút</i></span>--}}
{{--                                            <span>Giá:<i>400000 VND</i></span>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                          </div>--}}
{{--                            <div class="ps-cart__total">--}}
{{--                                <p>Số dịch vụ<span>1</span></p>--}}
{{--                                <p>Tổng thời gian :<span>30 phút</span></p>--}}
{{--                                <p>Tổng tiền :<span> 500 vnd</span></p>--}}
{{--                            </div>--}}
{{--                            <div class="ps-cart__footer">--}}
{{--                                <a class="ps-btn" href="#">Đặt lịch<i--}}
{{--                                        class="ps-icon-arrow-left"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                    <div class="menu-toggle"><span></span></div>
                </div>
            </div>
        </nav>
</header>
<div class="header-services">
    <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0"
         data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1"
         data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="fa fa-diamond"></i><strong>Đăng ký tài khoản</strong>: Đặt lịch nhanh chóng</p>
        <p class="ps-service"><i class="fa fa-black-tie"></i><strong>Nhân viên</strong>: Chuyên môn cao, được tập huấn
            kĩ càng</p>
        <p class="ps-service"><i class="fa fa-paper-plane-o"></i><strong>Trang thiết bị</strong>: Hiện đại, được nhập
            khẩu </p>

    </div>

</div>
<main class="ps-main">
    @yield("main")
    <div class="ps-footer bg--cover" data-background="images/background/parallax.jpg">
        <div class="ps-footer__content">
            <div class="ps-container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                        <aside class="ps-widget--footer ps-widget--info">
                            <header>
                                <h3 class="ps-widget__title">Chi nhánh 1</h3>
                            </header>
                            <footer>
                                <p><strong>Nguyễn Văn Cừ Cần Thơ</strong></p>
                                <p>Email: <a href='#'>support1@store.com</a></p>
                                <p>Phone: +123 456 789</p>
                                <p>Fax: ++123 456 789</p>
                            </footer>
                        </aside>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                        <aside class="ps-widget--footer ps-widget--info">
                            <header>
                                <h3 class="ps-widget__title">Chi nhánh 2</h3>
                            </header>
                            <footer>
                                <p><strong>Mậu Thân Cần Thơ</strong></p>
                                <p>Email: <a href=#'>support2@store.com</a></p>
                                <p>Phone: +123 456 789</p>
                                <p>Fax: ++123 456 789</p>
                            </footer>
                        </aside>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                        <aside class="ps-widget--footer ps-widget--link">
                            <header>
                                <h3 class="ps-widget__title">Giúp đỡ</h3>
                            </header>
                            <footer>
                                <ul class="ps-list--line">
                                    <li><a href="#">Việc làm</a></li>
                                    <li><a href="#">Thông tin liên hệ</a></li>
                                </ul>
                            </footer>
                        </aside>
                    </div>

                </div>
            </div>
        </div>
        <div class="ps-footer__copyright">
            <div class="ps-container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                        <p>&copy; <a href="#">Duyên Spa</a>, Inc. All rights Resevered</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                        <ul class="ps-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
<style>
    .btn-primary {
        background-color: #2AC37D;
        color: white
    }

    .btn-primary:hover {
        background-color: #23be76;
        color: white
    }
    .ps-cart-item__content p span {
    color:white;
    }
    .title-cart{
        font-size: 14px !important;
        color:white !important;
    }
    .header .ps-logo{
        max-width: 250px;
    }
    .menu > li > a{
        font-size: 18px;
    }
</style>
<script>
      function showDropdown(el){
          console.log("phuc");
        let atr = el.getAttribute("class");
        if(atr.indexOf("open") == -1){
            atr = atr+ " open";
            el.setAttribute("class",atr);
        }
        else {
            atr = atr.replace("open", "");
           el.setAttribute("class",atr);
        }
    }


    function redenderNumberCart(number){
         return '<a class="ps-cart__toggle" href="#"><span><i>'+number+'</i></span><i class="ps-icon-shopping-cart"></i></a>';
    }
    function renderListCart(){
          let str='         <div class="ps-cart__listing">' +
              '                            <div class="ps-cart__content">';
        let cart = localStorage.getItem('{{ Session::get("username")}}-cart');
        if (cart == null || cart == "") {
            cart = "[]";
        }
        let data = JSON.parse(cart);
        let time = 0;
        let price = 0;
        data.forEach(function(el){
            str+='  <div class="ps-cart-item">\n' +
                '                                    <a class="ps-cart-item__close" href="#" onclick="removeItemCart('+el.serviceID+')"></a>\n' +
                '                                    <div class="ps-cart-item__thumbnail">\n' +
                '                                        <a href="#"></a>\n' +
                '                                        <img src="'+el.urlImg+'" alt=""></div>\n' +
                '                                    <div class="ps-cart-item__content">\n' +
                '                                        <a class="ps-cart-item__title" href="{{url("service/")}}/'+el.serviceID+'">'+el.name+'</a>\n' +
                '                                        <p>\n' +
                '                                            <span>Thời gian:<i>'+el.time+' phút</i></span>\n' +
                '                                            <span>Giá:<i>'+el.price+' VND</i></span>\n' +
                '                                    </p>\n' +
                '                                    </div></div>';
                time+=Number(el.time);
                price+=Number(el.price);
        });
          str+="</div>";
        if(time != undefined && time>0){
            str+='     <div class="ps-cart__total">\n' +
                '                                <p class="title-cart">Số dịch vụ<span>'+data.length+'</span></p>\n' +
                '                                <p class="title-cart">Tổng thời gian :<span>'+Number(time)+' phút</span></p>\n' +
                '                                <p class="title-cart">Tổng tiền :<span> '+Number(price)+' vnd</span></p>\n' +
                '                            </div>';
        }
        str+='     <div class="ps-cart__footer"><a class="ps-btn" href="{{url("booking")}}">Đặt lịch<i\n' +
            '                                        class="ps-icon-arrow-left"></i></a></div>'
        str+="</div>";
        if(data.length == 0) {return redenderNumberCart(data.length);}
                 return redenderNumberCart(data.length)+str;

    }


    function removeItemCart(serviceID){
        let cart = localStorage.getItem('{{ Session::get("username")}}-cart');
        if (cart == null || cart == "") {
            cart = "[]";
        }
        let data = JSON.parse(cart);

        let find = data.find(function (el) {
            return el.serviceID == serviceID
        });
        let index = data.indexOf(find);

        if(index != -1){
            data.splice(index, 1);
            localStorage.setItem('{{ Session::get("username")}}-cart', JSON.stringify(data));
            loadListCart();
        }
    }

    function loadListCart(){
          document.getElementById("ps-cart").innerHTML = renderListCart();
    }
      $( document ).ready(function() {
          loadListCart();
      });
</script>
</html>

