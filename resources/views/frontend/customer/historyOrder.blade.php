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
                        <h3 class="ps-post__title">Lịch sử hoá đơn</h3>
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
                                        <a class="nav-link active" href="#">Hoá đơn</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <table class="table ps-cart__table">
                                    <thead>
                                    <tr>
                                        <th>Hoá đơn id</th>
                                        <th>Nhân viên</th>
                                        <th>Ngày làm</th>
                                        <th>Tổng tiền</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                    </thead>
                                    <tbody id="list-cart">
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->hoa_don_id}}</td>
                                            <td>{{$order->nhanVien->ho_ten}}</td>
                                            <td>{{$order->created_at}}</td>
                                            <td>{{$order->totalPrice()}} VND</td>
                                            <td><a href="{{route("customer.historyOrderDetail",$order->hoa_don_id)}}" >Click</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                @if ($orders->lastPage() > 1)
                                    <ul class="pagination">
                                        <li class="{{ ($orders->currentPage() == 1) ? ' disabled' : '' }}">
                                            <a href="{{ $orders->url(1) }}">Trang trước</a>
                                        </li>
                                        @for ($i = 1; $i <= $orders->lastPage(); $i++)
                                            <li class="{{ ($orders->currentPage() == $i) ? ' active' : '' }}">
                                                <a href="{{ $orders->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="{{ ($orders->currentPage() == $orders->lastPage()) ? ' disabled' : '' }}">
                                            <a href="{{ $orders->url($orders->currentPage()+1) }}" >Trang kế</a>
                                        </li>
                                    </ul>
                                @endif
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



