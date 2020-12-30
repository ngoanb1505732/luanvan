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
        <div class="ps-container" style="width: 100%; margin-left: 20%">
            <div class="row">
                <div class="col-lg-10 col-md-12 ">
                    <div class="row">
                        <div class="col-lg-2 col-md-12" style="max-height: 222px;overflow-y: auto;">
                            @foreach($item->hinhAnh as $anh)
                                <div>
                                    <img onclick="chooseImge(this)" class="img-thumbnail-custom zoom-in"
                                         src="{{url("/")}}/{{$anh->duong_dan}}" alt="">
                                </div>
                            @endforeach

                                <div>
                                    <img onclick="chooseImge(this)" class="img-thumbnail-custom zoom-in"
                                         src="{{url("/")}}/{{$item->anh_dai_dien}}" alt="">
                                </div>
                        </div>

                        <div class="col-lg-4 col-md-12 ">
                            <div>
                                <img id="avartar" src="{{url("/")}}/{{$item->anh_dai_dien}}" alt="">
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-12 ">
                            <h1>{{$item->ten_dich_vu}}</h1>
                            <p class="ps-product__category"><a
                                    href="{{route("front-end.service.load",$item->loaiDichVu->loai_dich_vu_id)}}"> {{$item->loaiDichVu->ten_loai_dich_vu}}</a>
                            </p>
                            <div class="ps-product__price">Giá {{$item->gia_tien}} VND
                            </div>
                            <div class="ps-product__price">Thời gian {{$item->thoi_gian}} Phút
                            </div>
                            <div class="ps-product__shopping" style="width: 287px"><a
                                    style="font-size: 14px !important;" class="ps-btn mb-10" onclick="addCart()"
                                    href="#">Thêm vào giỏ hàng<i
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
                    <ul class="tab-list" style="margin-left: -50%;" role="tablist">
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

{{--                                <header>--}}
{{--                                    <div class="br-wrapper br-theme-fontawesome-stars">--}}
{{--                                        <div class="br-widget"><a href="#" data-rating-value="1"--}}
{{--                                                                  data-rating-text="1"--}}
{{--                                                                  class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                                        data-rating-value="1"--}}
{{--                                                                                                        data-rating-text="2"--}}
{{--                                                                                                        class="br-selected br-current"></a><a--}}
{{--                                                href="#" data-rating-value="1" data-rating-text="3"--}}
{{--                                                class="br-selected br-current"></a><a href="#" data-rating-value="1"--}}
{{--                                                                                      data-rating-text="4"--}}
{{--                                                                                      class="br-selected br-current"></a><a--}}
{{--                                                href="#" data-rating-value="5" data-rating-text="5"></a>--}}
{{--                                            <div class="br-current-rating">1</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <p>Bởi<a href=""> ABC</a> - November 25, 2017</p>--}}
{{--                                </header>--}}


@foreach($item->danhGia as $danhGia)
                            <div class="ps-review">
                                <div class="ps-review__content">
                                <header>
                                    <div class="br-wrapper br-theme-fontawesome-stars">
                                        <div class="br-widget">
                                         {!!  $star[$danhGia->diem-1]!!}
                                        </div>
                                    </div>
                                    <p>Bởi<a href="#"> {{$danhGia->khachHang->ho_ten}}</a> - {{$danhGia->created_at}}</p>
                                </header>



                                <p>{{$danhGia->noi_dung}}</p>
                            </div>
                        </div>
                        @endforeach
                            {!! Form::open(array('route' => 'front-end.rate.create','method'=>'POST',
                                'id'=>'form-validation',"autocomplete"=>"off" ,
                                'name'=>'form-validation', 'enctype'=>'multipart/form-data',
                                'class'=>"ps-product__review")) !!}

                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger" role="alert" id="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Đã xảy ra lỗi </strong> {{ $message }} !
                            </div>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success" role="alert" id="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ $message }}!</strong>
                            </div>
                        @endif

                            <h4>Thêm đánh giá</h4>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                    <div class="form-group">
                                        <label>Điểm đánh giá<span></span></label>
                                        <div class="br-wrapper br-theme-fontawesome-stars">
                                            <select class="ps-rating" id="start"
                                            style="display: none;" name="diem">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5" selected>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="text" name="dich_vu_id" value="{{$item->dich_vu_id}}" hidden>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 ">
                                        <div class="form-group">
                                            <label>Đánh giá:</label>
                                            <textarea name ="noi_dung" class="form-control" rows="6" required></textarea>
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



<!-- Custom scripts-->
<script type="text/javascript" src="{{url("frontend")}}/js/main.js"></script>
<script>

    function chooseImge(el) {
        document.getElementById("avartar").src = el.src;
    }

    function addCart() {

        @if(Session::has('username'))
        let urlImg = "{{url("/")}}/{{$item->anh_dai_dien}}";
        let serviceID = "{{$item->dich_vu_id}}";
        let name = "{{$item->ten_dich_vu}}";
        let time = "{{$item->thoi_gian}}";
        let price = "{{$item->gia_tien}}";
        let cart = localStorage.getItem('{{ Session::get("username")}}-cart');
        if (cart == null) {
            let data = {
                "urlImg": urlImg,
                "serviceID": serviceID,
                "name": name,
                "time": time,
                "price": price
            };
            let cart = [];
            cart.push(data);
            localStorage.setItem('{{ Session::get("username")}}-cart', JSON.stringify(cart));
            alert("Thêm vào giỏ hàng thành công");
        } else {
            let cart = localStorage.getItem('{{ Session::get("username")}}-cart');
            if (cart == null || cart == "") {
                cart = "[]";
            }
            let data = JSON.parse(cart);
            let itemCart = {
                "urlImg": urlImg,
                "serviceID": serviceID,
                "name": name,
                "time": time,
                "price": price
            };
            let find = data.find(function (el) {
                return el.serviceID == serviceID
            });
            let index = data.indexOf(find);
            if (index != -1) {
                alert("Giỏ hàng đã tồn tại dịch vụ");
            } else {
                data.push(itemCart);
                localStorage.setItem('{{ Session::get("username")}}-cart', JSON.stringify(data));
                alert("Thêm vào giỏ hàng thành công");

            }
            loadListCart();
        }
        @else
        alert("Bạn cần đăng nhập để thực hiện thao tác !");
        @endif
    }
</script>

<style>
    .ps-product--detail .ps-product__price {
        font-size: 18px !important;
    }

    .img-thumbnail-custom {
        max-width: 150px;
        margin-top: 12px;
    }

    .ps-review {
        max-width: 900px;
    }

    ::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #82f382;
        border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #82f382;
    }

    .thumbnail-custom {
        max-height: 100px;
    }

    .zoom-in {
        cursor: zoom-in;
    }
   #alert{
        width: 500px;
    }
</style>
