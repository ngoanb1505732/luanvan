@section('title', 'Dashboard')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
 <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="cat__content">

<div class="row">
    <div class="col-xl-4"  style="background-color:#fff; margin-bottom:21px;">
        <div class="cat__core__widget cat__core__widget__2">
            <div class="cat__core__widget__2__head" style="background-image: url('{!! asset('/dist/modules/dummy-assets/common/img/photos/background-admin-1.png') !!}');">
            </div>
            <div class="cat__core__widget__2__content">
                <div class="cat__core__widget__2__left">
                 <?php
                    if(isset(Auth::user()->id) && isset(Auth::user()->profile_photo_path) && !empty(Auth::user()->profile_photo_path))
                    {
                        $profileimage=Auth::user();
                   ?>
                   <a class="cat__core__avatar cat__core__avatar--90 cat__core__avatar--border-white" href="javascript:void(0);">
                     <img src="<?php echo asset("/upload/profileimage/$profileimage->profile_photo_path") ?>" alt="">
                    </a>
                   <?php }else{ ?>
                         <a class="cat__core__avatar cat__core__avatar--90 cat__core__avatar--border-white" href="javascript:void(0);">
                            <img src="{!! asset('/upload/profileimage/user_profile.jpg') !!}" alt="Alternative text to the image">
                         </a>
                   <?php } ?>
                    <br />
					<h3>Welcome  {{ Auth::user()->name }}</h3>
					<h6>{{ Auth::user()->email }}</h6><br>
                	<p>{{ Auth::user()->profile_summary }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="row">
            <div class="col-lg-6">
                <div class="cat__core__widget p-3">
                    <strong>Tổng doanh thu: {{$totalPrice}} VND</strong>
                    <p class="text-muted"></p>
                    <div class="progress mb-3" style="height: 7px">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 87%"></div>
                    </div>
                    <strong>Khách hàng mới: {{count($customers)}}</strong>
                    <p class="text-muted"></p>
                    <div class="progress mb-3" style="height: 7px">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
                    </div>
                    <strong>Dịch vụ: {{count($services)}}</strong>
                    <p class="text-muted"></p>
                    <div class="progress mb-3" style="height: 7px">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 18%"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="cat__core__widget cat__core__widget__3 bg-default">
                    <div class="carousel slide" id="carousel-1" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-1" data-slide-to="1" class=""></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <a href="javascript: void(0);" class="cat__core__widget__3__body text-white">
                                    <div class="cat__core__widget__3__icon">
                                        <i class="icmn-accessibility"></i>
                                    </div>
                                    <h2><i class="icmn-accessibility"></i> Bán Hàng</h2>
                                    <p>Báo cáo</p>
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a href="javascript: void(0);" class="cat__core__widget__3__body text-white">
                                    <div class="cat__core__widget__3__icon">
                                        <i class="icmn-download"></i>
                                    </div>
                                    <h2><i class="icmn-download"></i>Tất Cả Báo Cáo</h2>
                                    <p>Tải xuống</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cat__core__widget cat__core__widget__3 bg-default">
                    <div class="carousel slide" id="carousel-2" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-2" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-2" data-slide-to="1" class=""></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <a href="javascript: void(0);" class="cat__core__widget__3__body text-white">
                                    <div class="cat__core__widget__3__icon">
                                        <i class="icmn-barcode"></i>
                                    </div>
                                    <h2>
                                        <i class="icmn-barcode"></i> Dịch vụ
                                    </h2>
                                    <p>Tải xuống
                                    </p>
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a href="javascript: void(0);" class="cat__core__widget__3__body text-white">
                                    <div class="cat__core__widget__3__icon">
                                        <i class="icmn-stats-dots"></i>
                                    </div>
                                    <h2>
                                        <i class="icmn-stats-dots"></i> Hoá đơn
                                    </h2>
                                    <p>Tải xuống
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cat__core__widget cat__core__widget__3 bg-default">
                    <div class="carousel slide" id="carousel-4" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-4" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-4" data-slide-to="1" class=""></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <a href="javascript: void(0);" class="cat__core__widget__3__body text-white">
                                    <div class="cat__core__widget__3__icon">
                                        <i class="icmn-users"></i>
                                    </div>
                                    <h2>
                                        <i class="icmn-users"></i> Khách Hàng
                                    </h2>
                                    <p>Tải xuống
                                    </p>
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a href="javascript: void(0);" class="cat__core__widget__3__body text-white">
                                    <div class="cat__core__widget__3__icon">
                                        <i class="icmn-cart"></i>
                                    </div>
                                    <h2>
                                        <i class="icmn-cart"></i> Sẩn phẩm bán chạy
                                    </h2>
                                    <p>Tải xuống
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="cat__core__widget">
            <p class="pt-3 px-3"><strong>Thống kê tháng này </strong>
            <span class="dot-yellow "></span> Khách hàng
                <span class="dot-blue "></span> Hoá đơn
                <span class="dot-white-green "></span> Đặt lịch
            </p>
            <div class="chart-line height-300 chartist"></div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="cat__core__widget">
            <p class="pt-3 px-3"><strong>Thống kê năm</strong></p>
            <div class="chart-overlapping-bar height-300 chartist"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="cat__core__widget">
            <div class="cat__core__step cat__core__step--success">
                <span class="cat__core__step__digit">
                    <i class="icmn-database"><!-- --></i>
                </span>
                <div class="cat__core__step__desc">
                    <span class="cat__core__step__title">Dịch vụ</span>
                    <p>Tổng : {{count($services)}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="cat__core__widget">
            <div class="cat__core__step cat__core__step--primary">
                <span class="cat__core__step__digit">
                    <i class="icmn-users"><!-- --></i>
                </span>
                <div class="cat__core__step__desc">
                    <span class="cat__core__step__title">Khách hàng</span>
                    <p>Tổng: {{count($customers)}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="cat__core__widget">
            <div class="cat__core__step cat__core__step--danger">
                <span class="cat__core__step__digit">
                    <i class="icmn-bullhorn"><!-- --></i>
                </span>
                <div class="cat__core__step__desc">
                    <span class="cat__core__step__title">Nhân viên</span>
                    <p>Tổng: {{count($employees)}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="cat__core__widget">
            <div class="cat__core__step cat__core__step--default">
                <span class="cat__core__step__digit">
                    <i class="icmn-price-tags"><!-- --></i>
                </span>
                <div class="cat__core__step__desc">
                    <span class="cat__core__step__title">Hoá đơn</span>
                    <p>Tổng: {{count($orders)}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="cat__core__widget">
            <div class="table-responsive">
                <table class="table table-hover nowrap" width="100%">
                    <thead class="thead-inverse">
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>SDT</th>
                        <th>Địa chỉ</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>SDT</th>
                        <th>Địa chỉ</th>

                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{$employee->nhan_vien_id}}</td>
                            <td>{{$employee->ho_ten}}</td>
                            <td>{{$employee->sdt}}</td>
                            <td>{{$employee->dia_chi}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- END: page scripts -->
<!-- START: page scripts -->
<script>
    $( function() {

        ///////////////////////////////////////////////////////////
        // tooltips
        $("[data-toggle=tooltip]").tooltip();

        ///////////////////////////////////////////////////////////
        // chart1
        new Chartist.Line(".chart-line", {
            labels: ["T2", "T3", "T4", "T5", "T6","T7","CN"],
            series: [
                [5, 0, 7, 8, 12,15,17],
                [2, 1, 5, 7, 3,5,3],
                [5, 8, 8, 5, 15,20,21]
            ]
        }, {
            fullWidth: !0,
            chartPadding: {
                right: 40
            },
            plugins: [
                Chartist.plugins.tooltip()
            ]
        });

        ///////////////////////////////////////////////////////////
        // chart 2
        var overlappingData = {
                    labels: ["Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    series: [
                        [12, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
                        [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
                    ]
                },
                overlappingOptions = {
                    seriesBarDistance: 10,
                    plugins: [
                        Chartist.plugins.tooltip()
                    ]
                },
                overlappingResponsiveOptions = [
                    ["", {
                        seriesBarDistance: 5,
                        axisX: {
                            labelInterpolationFnc: function(value) {
                                return value[0]
                            }
                        }
                    }]
                ];

        new Chartist.Bar(".chart-overlapping-bar", overlappingData, overlappingOptions, overlappingResponsiveOptions);

        ///////////////////////////////////////////////////////////
        // custom scroll
        if (!('ontouchstart' in document.documentElement) && jQuery().jScrollPane) {
            $('.custom-scroll').each(function() {
                $(this).jScrollPane({
                    contentWidth: '100%',
                    autoReinitialise: true,
                    autoReinitialiseDelay: 100
                });
                var api = $(this).data('jsp'),
                        throttleTimeout;
                $(window).bind('resize', function() {
                    if (!throttleTimeout) {
                        throttleTimeout = setTimeout(function() {
                            api.reinitialise();
                            throttleTimeout = null;
                        }, 50);
                    }
                });
            });
        }

    } );
</script>
<!-- END: page scripts -->
@include('components/footer')
<style>
    .dot-yellow {
        height: 11px;
        width: 11px;
        background-color: #f2f90d;
        border-radius: 50%;
        display: inline-block;
    }

    .dot-blue {
        height: 11px;
        width: 11px;
        background-color: #0190fe;
        border-radius: 50%;
        display: inline-block;
    }
    .dot-white-green {
        height: 11px;
        width: 11px;
        background-color: #7dd3ae;
        border-radius: 50%;
        display: inline-block;
    }

    </style>
