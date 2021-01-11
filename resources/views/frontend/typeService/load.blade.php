@extends("frontend.template.index")
@section("title")
    Dịch vụ
@endsection
@section("main")


    <div class="ps-blog-grid pt-80 pb-80">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <div class="ps-post--detail">
                        <div class="ps-post__header">
                            <h3 class="ps-post__title">Thông tin loại  dịch vụ {{$item->ten_loai_dich_vu}}</h3>
                        </div>
                        <div class="ps-post__content">

                            {!!$item->dien_giai!!}
                        </div>
              </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <aside class="ps-widget--sidebar">
                        <div class="ps-widget__header">
                            <h3>Dịch vụ khác</h3>
                        </div>
                        <div class="ps-widget__content">
                            @foreach($services as $service )
                            <div class="ps-shoe--sidebar">
                                <div class="ps-shoe__thumbnail"><a href="#"></a><img src="{{url("/")}}/{{$service->anh_dai_dien}}"
                                                                                     alt=""></div>
                                <div class="ps-shoe__content"><a class="ps-shoe__title" href="#">{{$service->ten_dich_vu}}</a>
                                    <p>
                                {{$service->gia_tien}} VND
                                    </p>
                                    <a class="ps-btn" href="{{route("front-end.service.load",$service->dich_vu_id)}}">Chi tiết</a>
                                </div>
                           </div>
                            @endforeach
                        </div>
                    </aside>
                    <aside class="ps-widget--sidebar">
                        <div class="ps-widget__header">
                            <h3>Loại Dịch vụ khác</h3>
                        </div>
                        <div class="ps-widget__content">
                            <ul class="ps-tags">
                                @foreach($typeServices as $el)
                                <li><a href="{{route("front-end.typeService.load",$el->loai_dich_vu_id)}}">{{$el->ten_loai_dich_vu}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <div class="ps-section--features-product ps-section masonry-root pt-100 pb-100">
        <div class="ps-container">
            <div class="ps-section__header mb-50">
                <h3 class="ps-section__title" data-mask="Dịch vụ">Dịch vụ {{$item->ten_loai_dich_vu}}</h3>
            </div>
            <div class="ps-section__content pb-50">
                <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30"
                     data-radio="100%">
                    <div class="ps-masonry">
                        <div class="grid-sizer"></div>
                        @foreach($item->dichVu as $dichVu)
                            <div class="grid-item {{$item->loai_dich_vu_id}}">
                                <div class="grid-item__content-wrapper">
                                    <div class="ps-shoe mb-30">

                                        <div class="ps-shoe__thumbnail">
                                            <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a>
                                            <img src="{{url("/")}}/{{$dichVu->anh_dai_dien}}" alt=""><a
                                                class="ps-shoe__overlay" href="#"></a>
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
                                            <div class="ps-shoe__detail"><a class="ps-shoe__name"
                                                                            href="{{route("front-end.service.load",$dichVu->dich_vu_id)}}">{{$dichVu->ten_dich_vu}}</a>
                                                <p class="ps-shoe__categories"><a href="{{route("front-end.typeService.load",$item->loai_dich_vu_id)}}">{{$item->ten_loai_dich_vu}}</a>
                                                </p><span class="ps-shoe__price">
                              {{$dichVu->gia_tien}} VND</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
    </body>
    </html>


