@extends("frontend.template.index")
@section("title")
   Đăng nhập
@endsection
@section("main")
    <div class="ps-blog-grid pt-80 pb-80">
        <div class="ps-container">
            <div class="row">
                <div class="ps-post--detail">
                    <div class="ps-post__header">
                        <h3 class="ps-post__title">Đăng nhập</h3>
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

                    {{--                    <form class="needs-validation" novalidate>--}}

                    {!! Form::open(array('route' => 'customer.loginAction','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data')) !!}

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <label for="username">Username</label>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <input type="text" class="form-control" id="username" name="username"
                                           placeholder="Nhập Username"  minlength="5" onchange="validateUsername()"required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <label for="password">Password</label>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <input type="password" class="form-control" id="password" minlength="6"
                                           placeholder="Nhập password" name="password" required>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">

                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="submit" style="margin-left: 50%" class="btn btn-primary">Đăng nhập</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @endsection
    </body>
    </html>
    <script>
        function validateUsername(){
            let username = document.getElementById("username");
            $.ajax({url: "http://localhost/luanvan/public/api",
                data:{"action":"checkCustomerExist","username":username.value},
                method:"POST",
                success: function(result){
                    if(result == "true"){
                        username.setCustomValidity("");
                    }
                    else {
                        username.setCustomValidity("Username không tồn tại");
                    }
                }
            });
        }
        </script>
