@extends("frontend.template.index")
@section("title")
    Trang chủ
@endsection


@section("main")
    <div class="ps-banner" style="overflow: visible;margin-left: 25%;width: 50%;">
    <div class="w3-content w3-display-container">
        <img class="mySlides" src="{{url("/")}}/frontend/banner/banner1.png" style="display:block;width:100%">
        <img class="mySlides" src="{{url("/")}}/frontend/banner/banner2.png" style="width:100%">
        <img class="mySlides" src="{{url("/")}}/frontend/banner/banner0.jpg" style="width:100%">
        <div  style="text-align:center;margin-top: 15px;">
            <span class="dot" onclick="currentDiv(1)"></span>
             <span class="dot" onclick="currentDiv(2)"></span>
            <span class="dot" onclick="currentDiv(3)"></span>
        </div>
    </div>
    </div>
    <div class="ps-section--features-product ps-section masonry-root pt-100 pb-100">
        <div class="ps-container">
            <div class="ps-section__header mb-50">
                <h3 class="ps-section__title" data-mask="Dịch vụ">Dịch vụ</h3>
                <ul class="ps-masonry__filter">
                    <?php $t=0 ;?>
                    @foreach($typeServices as $item)
                    <?php $t+=count($item->dichVu); ?>
                                <li><a href="#" data-filter=".{{$item->loai_dich_vu_id}}">{{$item->ten_loai_dich_vu}} <sup>{{count($item->dichVu)}}</sup></a></li>
                              @endforeach
                        <li><a href="#" data-filter="*">Tất cả <sup>{{$t}}</sup></a></li>

                </ul>
            </div>
            <div class="ps-section__content pb-50">
                <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
                    <div class="ps-masonry">
                        <div class="grid-sizer"></div>

                        @foreach($typeServices as $item)
                            @foreach($item->dichVu as $dichVu)
                            <div class="grid-item {{$item->loai_dich_vu_id}}">
                                <div class="grid-item__content-wrapper">
                                    <div class="ps-shoe mb-30">

                                        <div class="ps-shoe__thumbnail">
                                            <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a>
                                            <img src="{{url("/")}}/{{$dichVu->anh_dai_dien}}" alt=""><a class="ps-shoe__overlay" href="#"></a>
                                        </div>


                                        <div class="ps-shoe__content">
                                            <div class="ps-shoe__variants">
                                                <div class="ps-shoe__variant normal">
                                                    <img src="{{url("/")}}/{{$dichVu->anh_dai_dien}}" alt="">
                                                @foreach($dichVu->hinhAnh as $anh)
                                                        <img src="{{url("/")}}/{{$anh->duong_dan}}" alt="">
                                                    @endforeach
                                                </div>
                                                <select class="ps-rating ps-shoe__rating">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="3">5</option>
                                                </select>
                                            </div>
                                            <div class="ps-shoe__detail"><a class="ps-shoe__name" href="{{route("front-end.service.load",$dichVu->dich_vu_id)}}">{{$dichVu->ten_dich_vu}}</a>
                                                <p class="ps-shoe__categories"><a href="{{route("front-end.service.load",$item->loai_dich_vu_id)}}">{{$item->ten_loai_dich_vu}}</a></p><span class="ps-shoe__price">
                              {{$dichVu->gia_tien}} VND</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-section--offer">
        <div class="ps-column"><a class="ps-offer" href="product-listing.html"><img src="{{url("frontend/banner")}}/banner1.jpg" alt=""></a></div>
        <div class="ps-column"><a class="ps-offer" href="product-listing.html"><img src="{{url("frontend/banner")}}/banner2.jpg" alt=""></a></div>
    </div>
    <div class="ps-section--sale-off ps-section pt-80 pb-40">
        <div class="ps-container">
            <div class="ps-section__header mb-50">
                <h3 class="ps-section__title" data-mask="Sale off">- Hot Deal Today</h3>
            </div>
            <div class="ps-section__content">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="ps-hot-deal">
                            <h3>Nike DUNK Max 95 OG</h3>
                            <p class="ps-hot-deal__price">Only:  <span>£155</span></p>
                            <ul class="ps-countdown" data-time="December 13, 2017 15:37:25">
                                <li><span class="hours"></span><p>Hours</p></li>
                                <li class="divider">:</li>
                                <li><span class="minutes"></span><p>minutes</p></li>
                                <li class="divider">:</li>
                                <li><span class="seconds"></span><p>Seconds</p></li>
                            </ul><a class="ps-btn" href="#">Order Today<i class="ps-icon-next"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="ps-hotspot"><a class="point first active" href="javascript:;"><i class="fa fa-plus"></i>
                                <div class="ps-hotspot__content">
                                    <p class="heading">JUMP TO HEADER</p>
                                    <p>Dynamic Fit Collar en la zona del tobillo que une la parte inferior de la pierna y el pie sin reducir la libertad de movimiento.</p>
                                </div></a><a class="point second" href="javascript:;"><i class="fa fa-plus"></i>
                                <div class="ps-hotspot__content">
                                    <p class="heading">JUMP TO HEADER</p>
                                    <p>Dynamic Fit Collar en la zona del tobillo que une la parte inferior de la pierna y el pie sin reducir la libertad de movimiento.</p>
                                </div></a><a class="point third" href="javascript:;"><i class="fa fa-plus"></i>
                                <div class="ps-hotspot__content">
                                    <p class="heading">JUMP TO HEADER</p>
                                    <p>Dynamic Fit Collar en la zona del tobillo que une la parte inferior de la pierna y el pie sin reducir la libertad de movimiento.</p>
                                </div></a><img src="images/hot-deal.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="ps-section ps-section--top-sales ps-owl-root pt-80 pb-80">--}}
{{--        <div class="ps-container">--}}
{{--            <div class="ps-section__header mb-50">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">--}}
{{--                        <h3 class="ps-section__title" data-mask="Top dịch vụ">- Dịch vụ</h3>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">--}}
{{--                        <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a><a class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="ps-section__content">--}}
{{--                <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">--}}
{{--                    <div class="ps-shoes--carousel">--}}
{{--                        <div class="ps-shoe">--}}
{{--                            <div class="ps-shoe__thumbnail">--}}
{{--                                <div class="ps-badge"><span>New</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/1.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>--}}
{{--                            </div>--}}
{{--                            <div class="ps-shoe__content">--}}
{{--                                <div class="ps-shoe__variants">--}}
{{--                                    <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>--}}
{{--                                    <select class="ps-rating ps-shoe__rating">--}}
{{--                                        <option value="1">1</option>--}}
{{--                                        <option value="1">2</option>--}}
{{--                                        <option value="1">3</option>--}}
{{--                                        <option value="1">4</option>--}}
{{--                                        <option value="2">5</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air Jordan 7 Retro</a>--}}
{{--                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
</body>
</html>
<style>
    .mySlides {display:none;
    width:100%;
   height: 400px;
    }
    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
    }

    .active-dot, .dot:hover {
        background-color: #717171;
    }
</style>

<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function currentDiv(n) {
        showDivs(slideIndex = n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active-dot", "");
        }
        x[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active-dot";
    }
</script>

