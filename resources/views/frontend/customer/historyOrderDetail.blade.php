@extends("frontend.template.index")
@section("title")
    Lịch sử hoá đơn
@endsection
@section("main")
    <div class="ps-blog-grid pt-80 pb-80">
        <div class="ps-container">
            <div class="row">
                <div class="ps-post--detail">
                    <div class="ps-post__header">
                        <h3 class="ps-post__title">Chi tiết hoá đơn #{{$order->hoa_don_id}}</h3>
                    </div>
                    <div class="ps-post__content">
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger" role="alert" id="id">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ $message }} !</strong>
                            </div>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success" role="alert" id="id">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ $message }}!</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div>
                </div>

                <div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{route("customer.updateInfo")}}">Thông tin tài khoản</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{route("customer.bookingHistory","false")}}">Lịch hẹn</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{route("customer.historyOrder")}}">Hoá đơn</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <table class="table ps-cart__table">
                                    <thead>
                                    <tr>
                                        <th>Dịch vụ id</th>
                                        <th>Tên dịch vụ</th>
                                        <th>Giá tiền</th>
                                        <th>Số lượng</th>
                                    </tr>
                                    </thead>
                                    <tbody id="list-cart">
                                  @foreach($order->chiTietHoaDon as $item)
                                  <tr>
                                      <th>{{$item->dich_vu_id}}</th>
                                      <th>{{$item->dichVu->ten_dich_vu}}</th>
                                      <th>{{$item->gia_tien}} VND</th>
                                      <th>{{$item->so_luong}}</th>
                                  </tr>
                                  @endforeach
                                    </tbody>
                                </table>
                                <div style="text-align: right">
                                  <a href="{{route("customer.historyOrder")}}" > <button class="btn btn-success"  >Quay lại</button>
                                  </a>
                                </div>
                                <div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @endsection
    </body>
    </html>
    <style>
        .ps-post__title{
            text-align: center;
        }
        .nav-item{
            font-size: 15px;
        }
        .active{
            font-weight: bold;
        }
    </style>



