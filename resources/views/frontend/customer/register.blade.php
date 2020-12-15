@extends("frontend.template.index")
@section("title")
    Đăng ký
@endsection
@section("main")
    <div class="ps-blog-grid pt-80 pb-80">
        <div class="ps-container">
            <div class="row">
                <div class="ps-post--detail">
                    <div class="ps-post__header">
                        <h3 class="ps-post__title">Đăng ký tài khoản</h3>
                    </div>
                    <div class="ps-post__content">

                    </div>
                </div>
                <div>
                </div>

                <div>

{{--                    <form class="needs-validation" novalidate>--}}

                    {!! Form::open(array('route' => 'customer.registerAction','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data')) !!}

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <label for="username">Username</label>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <input type="text" class="form-control" id="username" name="username"
                                               placeholder="Nhập Username" onchange="validateUsername()" minlength="5" required>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <small id="usernameHelp" class="text-danger" hidden>
                                            Username đã tồn tại
                                        </small>
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
                                               placeholder="Nhập password" name="password" onchange="validatePassword()" required>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <small id="passwordHelp" class="text-danger" hidden>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <label for="confirm_password">Nhập lại Password</label>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <input type="password" class="form-control" id="confirm_password"
                                               placeholder="Nhập lại password" onchange="validatePassword()" required>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
{{--                                        <small id="passwordHelp2" class="text-danger" hidden>--}}
{{--                                            Password không giống nhau--}}
{{--                                        </small>--}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <label for="name">Họ tên</label>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <input type="text" class="form-control" id="name" placeholder="Nhập họ tên" name="ho_ten" required>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <label for="ngay_sinh">Ngày sinh</label>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <label for="sdt">Số điện thoại</label>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <input type="text" class="form-control" id="sdt" placeholder="Nhập số điện thoại"
                                               name="sdt">                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <small id="passwordHelp2" class="text-danger" hidden>
                                          Số điện thoại không hợp lệ
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <label for="dia_chi">Địa chỉ</label>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <input type="text" class="form-control" id="dia_chi" placeholder="Nhập địa chỉ"
                                               name="dia_chi">                             </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                                   </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="submit" style="margin-left: 50%" class="btn btn-primary">Tạo tài khoản</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @endsection
    </body>
    </html>
    <script>
        var isValid = true;

    // function checkPassword(){
    //     // if($('#password1').val() ==$('#password2').val()){
    //     //     isValid  =true;
    //     // $("#passwordHelp2").hiden();
    //     // }
    //     // else {
    //     //     isValid = false;
    //     //     $("#passwordHelp2").show();
    //     // }
    //     console.log("phuc");
    //     return $('#password1').val() ==$('#password2').val();
    //
    // }



        // $('form').validator({
        //     validHandlers: {
        //         '#password2':function(input) {
        //             //may do some formatting before validating
        //             if(input.val()!=$('#password1').val()){
        //                 return true;
        //             }
        //             return false;
        //         }
        //     }
        // });

        // $(document).ready(function() {
        //     $('form-validation').bootstrapValidator({
        //         feedbackIcons: {
        //         },
        //         // fields: {
        //         //     password2: {
        //         //         validators: {
        //         //                 if($('#password1').val() ==$('#password2').val()){
        //         //                     isValid  =true;
        //         //             return false;
        //         //                 }
        //         //                 else {
        //         //              return true;
        //         //                 }
        //         //         }
        //         //     }
        //         // }
        //
        //         password2: {
        //             equals: function($el) {
        //                 var matchValue = $('#password1').val() // foo
        //                 if ($el.val() !== matchValue) {
        //                     return "Sai password";
        //                 }
        //             }
        //         }
        //     });
        // });




        function validatePassword(){

            let password1 = document.getElementById("password");
            let confirm_password = document.getElementById("confirm_password");
            if(password1.value != confirm_password.value) {
                confirm_password.setCustomValidity("Mật khẩu không giống nhau");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        function validateUsername(){
            let username = document.getElementById("username");
            $.ajax({url: "http://localhost/luanvan/public/api",
                data:{"action":"checkCustomerExist","username":username.value},
                method:"POST",
                success: function(result){
                  if(result == "true"){
                      username.setCustomValidity("Username đã tồn tại");
                  }
                  else {
                      username.setCustomValidity("");
                  }
                }
            });
        }
    </script>

