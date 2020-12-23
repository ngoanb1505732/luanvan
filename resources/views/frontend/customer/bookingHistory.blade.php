@extends("frontend.template.index")
@section("title")
Lịch sử đặt lịch
@endsection
@section("main")
    <div class="ps-blog-grid pt-80 pb-80">
        <div class="ps-container">
            <div class="row">
                <div class="ps-post--detail">
                    <div class="ps-post__header">
                        <h3 class="ps-post__title">Lịch sử đặt lịch</h3>
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
                                    <a class="nav-link active" href="#">Lịch hẹn</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Lịch sử</a>
                                </li>
                          </ul>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <table class="table ps-cart__table">
                                    <thead>
                                    <tr>
                                        <th>Tên nhân viên</th>
                                        <th>Ngày làm</th>
                                        <th>Thời gian làm</th>
                                        <th>Trạng thái</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                    </thead>
                                    <tbody id="list-cart">
                                    @foreach($bookings as $booking)
                                        <tr>
                                        <td>{{$booking->nhanVien->ho_ten}}</td>
                                        <td>{{$booking->ngay_lam}}</td>
                                        <td>{{$booking->thoi_gian_lam}} phút</td>
                                        <td>{{$booking->trang_thai}}</td>
                                        <td>Chi tiết</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                @if ($bookings->lastPage() > 1)
                                    <ul class="pagination">
                                        <li class="{{ ($bookings->currentPage() == 1) ? ' disabled' : '' }}">
                                            <a href="{{ $bookings->url(1) }}">Trang trước</a>
                                        </li>
                                        @for ($i = 1; $i <= $bookings->lastPage(); $i++)
                                            <li class="{{ ($bookings->currentPage() == $i) ? ' active' : '' }}">
                                                <a href="{{ $bookings->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="{{ ($bookings->currentPage() == $bookings->lastPage()) ? ' disabled' : '' }}">
                                            <a href="{{ $bookings->url($bookings->currentPage()+1) }}" >Trang kế</a>
                                        </li>
                                    </ul>
                                @endif
{{--                                {!! $bookings->links() !!}--}}
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

    @if($boolean)
    <script>
        localStorage.setItem('{{ Session::get("username")}}-cart', "");
        loadListCart();
        </script>
        @endif


