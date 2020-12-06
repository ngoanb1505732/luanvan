@extends("frontend.template.index")
@section("title")
    Liệu trình
@endsection
@section("main")
    <div class="test">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                </div>
            </div>
        </div>
    </div>
    <div class="ps-product--detail pt-60">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-10 col-md-12 col-lg-offset-1">
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-lg-offset-1">
                            @foreach($item->hinhAnh as $anh)
                                <div>
                                    <img src="{{url("/")}}/{{$anh->duong_dan}}" alt="">
                                </div>
                            @endforeach
                        </div>

                        <div class="col-lg-6 col-md-12 col-lg-offset-1">
                                                    <div>
                                    <img src="{{url("/")}}/{{$item->anh_dai_dien}}" alt="">
                                </div>

                        </div>
                        <div class="col-lg-3 col-md-12 col-lg-offset-1">
                            <h1>{{$item->ten_dich_vu}}</h1>
                            <p class="ps-product__category"><a
                                    href="{{route("front-end.service.load",$item->dichVu->dich_vu_id)}}"> {{$item->dichVu->ten_dich_vu}}</a>
                            </p>
                            <div class="ps-product__price">Giá {{$item->gia_tien}} VND
                            </div>
                            <div class="ps-product__price">Thời gian {{$item->thoi_gian}} Phút
                            </div>
                            <div class="ps-product__shopping"><a style="font-size: 14px !important;" class="ps-btn mb-10" href="cart.html">Thêm vào giỏ hàng<i
                                        class="ps-icon-next"></i></a>
                            </div>
                        </div>
                    </div>
{{--                    <div class="ps-product__thumbnail">--}}
{{--                        <div class="ps-product__preview">--}}
{{--                            <div class="ps-product__variants slick-initialized slick-slider slick-vertical">--}}
{{--                                <div aria-live="polite" class="slick-list draggable" style="height: 258px;">--}}
{{--                                    <div class="slick-track"--}}
{{--                                         style="opacity: 1; height: 946px; transform: translate3d(0px, -258px, 0px);"--}}
{{--                                         role="listbox">--}}
{{--                                                                       <div class="item slick-slide slick-cloned" style="width: 66px;" tabindex="-1"--}}
{{--                                             role="option"  data-slick-index="-3"--}}
{{--                                             aria-hidden="true">--}}
{{--                                            <img src="{{url("/")}}/{{$item->anh_dai_dien}}" alt="">--}}
{{--                                        </div>--}}




{{--                                        <div class="item slick-slide slick-current slick-active" style="width: 66px;"--}}
{{--                                             tabindex="-1" role="option"--}}
{{--                                             data-slick-index="0" aria-hidden="false"><img--}}
{{--                                                src="{{url("/")}}/{{$item->anh_dai_dien}}" alt=""></div>--}}
{{--                                </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="ps-product__image slick-initialized slick-slider">--}}
{{--                            <div aria-live="polite" class="slick-list draggable">--}}
{{--                                <div class="slick-track"--}}
{{--                                     style="opacity: 1; width: 2850px; transform: translate3d(-570px, 0px, 0px);"--}}
{{--                                     role="listbox">--}}
{{--                         <div class="item slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true"--}}
{{--                                         style="width: 570px;" tabindex="-1"><img class="zoom"--}}
{{--                                                                                  src="{{url("/")}}/{{$item->anh_dai_dien}}"--}}
{{--                                                                                  alt=""--}}
{{--                                                                                  data-zoom-image="{{url("/")}}/{{$item->anh_dai_dien}}">--}}
{{--                                    </div>--}}
{{--                                    <div id="show-img" class="item slick-slide slick-current slick-active" data-slick-index="0"--}}
{{--                                         aria-hidden="false" style="width: 570px;" tabindex="-1" role="option"--}}
{{--                                         aria-describedby="slick-slide"><img class="zoom"--}}
{{--                                                                                        src="{{url("/")}}/{{$item->anh_dai_dien}}"--}}
{{--                                                                                        alt=""--}}
{{--                                                                                        data-zoom-image="{{url("/")}}/{{$item->anh_dai_dien}}">--}}
{{--                                    </div>--}}


{{--                                </div>--}}
{{--                            </div>--}}


{{--                        </div>--}}
{{--                    </div>--}}

                </div>
                <div class="clearfix"></div>
                <div class="ps-product__content mt-50">
                    <ul class="tab-list" role="tablist">
                        <li class=""><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab"
                                        aria-expanded="false">Mô tả</a></li>
                        <li class="active"><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab"
                                              aria-expanded="true">Đánh giá</a></li>
                    </ul>
                </div>
                <div class="tab-content mb-60">
                    <div class="tab-pane" role="tabpanel" id="tab_01">
                        {!!  $item->mo_ta!!}
                    </div>
                    <div class="tab-pane active" role="tabpanel" id="tab_02">
                        <div class="ps-review">
                            <div class="ps-review__content">
                                <header>
                                    <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating"
                                                                                               style="display: none;">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <div class="br-widget"><a href="#" data-rating-value="1"
                                                                  data-rating-text="1"
                                                                  class="br-selected br-current"></a><a href="#"
                                                                                                        data-rating-value="1"
                                                                                                        data-rating-text="2"
                                                                                                        class="br-selected br-current"></a><a
                                                href="#" data-rating-value="1" data-rating-text="3"
                                                class="br-selected br-current"></a><a href="#" data-rating-value="1"
                                                                                      data-rating-text="4"
                                                                                      class="br-selected br-current"></a><a
                                                href="#" data-rating-value="5" data-rating-text="5"></a>
                                            <div class="br-current-rating">1</div>
                                        </div>
                                    </div>
                                    <p>Bởi<a href=""> ABC</a> - November 25, 2017</p>
                                </header>
                                <p>Đánh giá dịch vụ ở đây</p>
                            </div>
                        </div>
                        <form class="ps-product__review" action="_action" method="post">
                            <h4>Thêm đánh giá</h4>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                    <div class="form-group">
                                        <label>Your rating<span></span></label>
                                        <div class="br-wrapper br-theme-fontawesome-stars">
                                            <div class="br-widget"><a href="#" data-rating-value="1"
                                                                      data-rating-text="1"
                                                                      class="br-selected br-current"></a><a href="#"
                                                                                                            data-rating-value="1"
                                                                                                            data-rating-text="2"
                                                                                                            class="br-selected br-current"></a><a
                                                    href="#" data-rating-value="1" data-rating-text="3"
                                                    class="br-selected br-current"></a><a href="#"
                                                                                          data-rating-value="1"
                                                                                          data-rating-text="4"
                                                                                          class="br-selected br-current"></a><a
                                                    href="#" data-rating-value="5" data-rating-text="5"></a>
                                                <div class="br-current-rating">1</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 ">
                                    <div class="form-group">
                                        <label>Đánh giá:</label>
                                        <textarea class="form-control" rows="6"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="ps-btn ps-btn--sm">Submit<i class="ps-icon-next"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection


<script type="text/javascript" src="{{url("frontend")}}/plugins/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="{{url("frontend")}}/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript"
        src="{{url("frontend")}}/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script type="text/javascript" src="{{url("frontend")}}/plugins/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{url("frontend")}}/plugins/gmap3.min.js"></script>
<script type="text/javascript" src="{{url("frontend")}}/plugins/imagesloaded.pkgd.js"></script>
<script type="text/javascript" src="{{url("frontend")}}/plugins/isotope.pkgd.min.js"></script>
<script type="text/javascript"
        src="{{url("frontend")}}/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="{{url("frontend")}}/plugins/jquery.matchHeight-min.js"></script>
<script type="text/javascript" src="{{url("frontend")}}/plugins/slick/slick/slick.min.js"></script>
<script type="text/javascript" src="{{url("frontend")}}/plugins/elevatezoom/jquery.elevatezoom.js"></script>
<script type="text/javascript"
        src="{{url("frontend")}}/plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="{{url("frontend")}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB"></script>
<script type="text/javascript" src="plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript"
        src="{{url("frontend")}}/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript"
        src="{{url("frontend")}}/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script type="text/javascript"
        src="{{url("frontend")}}/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript"
        src="{{url("frontend")}}/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript"
        src="{{url("frontend")}}/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript"
        src="{{url("frontend")}}/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript"
        src="{{url("frontend")}}/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<!-- Custom scripts-->
<script type="text/javascript" src="{{url("frontend")}}/js/main.js"></script>

<style>
    .ps-product--detail .ps-product__price {
        font-size: 18px !important;
    }
</style>
