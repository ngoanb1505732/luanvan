@extends("frontend.template.index")
@section("title")
    Đặt lịch
@endsection
@section("main")
    <div class="ps-blog-grid pt-80 pb-80">
        <div class="ps-container">
            <div class="ps-cart-listing">
                <table class="table ps-cart__table">
                    <thead>
                    <tr>
                        <th>Tất cả dịch vụ</th>
                        <th>Giá</th>
                        <th>Thời gian</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="list-cart">

                    </tbody>
                </table>
                <div class="ps-cart__actions">
                    <div class="ps-cart__promotion">
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <select onchange="chooseEmployee()" id="select-employee"
                                            class="browser-default custom-select ">
                                        <option data-employeeId="" data-imgUrl="" data-employeeName="" selected>Chọn
                                            nhân viên
                                        </option>
                                        @foreach($employee as $item)
                                            <option data-employeeId="{{$item->nhan_vien_id}}"
                                                    data-imgUrl="{{$item->anh}}" data-employeeName="{{$item->ho_ten}}"
                                                    value="">{{$item->ho_ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <input class="form-control input-date-custom" id="chooseDay" name="" type="date"
                                           required>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <button type="button" onclick="search()" class="btn btn-info">Kiểm tra</button>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12" id="info-employee">
                                    </div>
                                    <div class="col-lg-8 col-md-12" id="schedule">


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-cart__total">
                        <h3>Tổng thời gian: <span id="total-time"></span></h3>
                        <h3>Tổng tiền: <span id="total-price"></span></h3>
                        <a class="ps-btn" onclick="booking()" href="#">Đặt lịch<i class="ps-icon-next"></i></a>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <div style="display: none">

        {!! Form::open(array('route' => 'front-end.booking.booking','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data')) !!}
        <input class="form-control" id="employeeID" name="employeeID" type="text">
        <input class="form-control" id="listService" name="listService" type="text">
        <input class="form-control" id="dateBooking" name="dateBooking" type="text">
        <input class="form-control" id="totalTimeInput" name="totalTimeInput" type="text">
        {!! Form::close() !!}
    </div>
    @endsection
    </body>
    </html>
    <style>
        .item-booking {
            text-align: center;
        }

        .item-booking img {
            height: 200px;
            width: 200px;
        }

        .item-booking .name {
            font-size: 15px;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .border-bottom {
            border-bottom: 1px solid #dee2e6 !important;
            margin-top: 37px;
            margin-bottom: 37px;
        }

        .label.form-control-label {
            font-size: 17px;
        }

        .row-custom {
            margin-left: 25%;
            text-align: center;
            margin-top: 14px;
        }

        .input-date-custom {
            text-align: center !important;
            width: 227px !important;
            height: 32px !important;
            /*margin-left: 27% !important;*/
        }

        .custom-select {
            width: 227px;
            text-align: center;
            outline: none;
            height: 32px;
            /*margin-left: 27%;*/
            background-color: #e4e4e4;
            border-color: #e4e4e4;
            box-shadow: none;
            border-radius: 0;
            padding: 0 20px;
        }

        img.mr-15 {
            max-width: 100px;
            max-height: 60px;
        }

        .ps-cart-listing .ps-cart__actions .ps-cart__total h3 span {
            font-size: 19px;
        }

        .employee-img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>

    <script>
        var imgUrl = "";
        var chooseTime = "";
        var arrHours = [
        {"time":"08:00","status":"able"},{"time":"08:30","status":"able"},{"time":"09:00","status":"able"},{"time":"09:30","status":"able"},
            {"time":"10:00","status":"able"},{"time":"10:30","status":"able"},{"time":"11:00","status":"able"},{"time":"11:30","status":"able"},
            {"time":"13:00","status":"able"},{"time":"13:30","status":"able"},{"time":"14:00","status":"able"},{"time":"14:30","status":"able"},
            {"time":"15:00","status":"able"},{"time":"15:30","status":"able"},{"time":"16:00","status":"able"},{"time":"16:30","status":"able"},
            {"time":"17:00","status":"able"},{"time":"17:30","status":"able"},{"time":"18:00","status":"able"},{"time":"18:30","status":"able"},
            {"time":"19:00","status":"able"},{"time":"19:30","status":"able"},{"time":"20:00","status":"able"},{"time":"20:30","status":"able"}
        ];
        var arrLoad=[];
        var endBreak =["11:30","20:30"];
            //
            // "08:00": "", "08:30": "", "09:00": "", "09:30": "",
            // "10:00": "", "10:30": "", "11:00": "", "11:30": "",
            // "13:00": "", "13:30": "", "14:00": "", "14:30": "",
            // "15:00": "", "15:30": "", "16:00": "", "16:30": "",
            // "17:00": "", "17:30": "", "18:00": "", "18:30": "",
            // "19:00": "", "19:30": "", "20:00": "", "20:30": "",
            //
        var employeeId = "";
        var listService = "";
        var time = 0;
        var price = 0;
        var bookingTime = "";

        function loadTitleCart() {
            employeeId = "";
            listService = "";
            time = 0;
            price = 0;
            let cart = localStorage.getItem('{{ Session::get("username")}}-cart');
            if (cart == null || cart == "") {
                cart = "[]";
            }
            let str = "";

            let data = JSON.parse(cart);

            data.forEach(function (el) {
                time += Number(el.time);
                price += Number(el.price);

                str += '                    <tr>\n' +
                    '                        <td><a class="ps-product__preview" href="{{url("service/")}}/' + el.serviceID + '"><img class="mr-15" src="' + el.urlImg + '" alt="">' + el.name + '</a></td>\n' +
                    '                        <td>' + el.price + ' VND</td>\n' +
                    '                        <td>' + el.time + ' phút</td>\n' +
                    '                       <td>\n' +
                    '                            <div class="ps-remove" onclick="removeDetailCart(' + el.serviceID + ')"></div>\n' +
                    '                        </td>\n' +
                    '                    </tr>';
                listService += (listService == "") ? el.serviceID : "," + el.serviceID;

            });
            document.getElementById("list-cart").innerHTML = str;
            document.getElementById("total-price").innerHTML = " " + price + " VND";
            document.getElementById("total-time").innerHTML = time + " phút";
        }

        setTimeout(function () {
            loadTitleCart()
        }, 2000);

        function search() {
            document.getElementById("info-employee").innerHTML = '        <img class="employee-img" src="' + imgUrl + '"/>';
            loadschedule();
        }


        function chooseEmployee() {
            let e = document.getElementById("select-employee");
            let selected = e.options[e.selectedIndex];
            employeeId = selected.getAttribute("data-employeeId");
            imgUrl = selected.getAttribute("data-imgUrl");

        }

        function removeDetailCart(serviceID) {
            removeItemCart(serviceID);
            loadTitleCart();
        }

        function loadschedule() {
            let date = document.getElementById("chooseDay").value;
            chooseTime = "";
            if (employeeId == "") {
                alert("Bạn chưa chọn nhân viên");
                return;
            }
            if (date == "") {
                alert("Bạn chưa chọn ngày");
                return;
            } else if (new Date(document.getElementById("chooseDay").value + " 00:00:00") < new Date()) {
                alert("Ngày bạn chọn nhỏ hơn ngày hiện tại");
                return;
            }
            $.ajax({
                url: "http://localhost/luanvan/public/api",
                data: {
                    "action": "getScheduleByEmployee",
                    "employeeID": employeeId,
                    "date": document.getElementById("chooseDay").value + " 00:00:00"
                },
                method: "POST",
                success: function (result) {
                    let valid = 0;
                    let str = "";
                    arrLoad = arrHours;
                    let t = 0;
                    arrLoad.forEach(element => {
                        t++;
                        if (result[element.time] != undefined) {
                            valid = parseInt(result[element.time]) / 30;
                        }
                        if (valid == 0) {
                            let onclick = "clickTime('" + element.time + "')";
                            str += '<button type="button" onclick="' + onclick + '" class="btn btn-light">' + element.time + '</button>';
                            if (t % 8 == 0) {
                                str += "<br><br>";
                            }
                        } else {
                            let onclick = "clickTime('')";
                            str += '<button type="button" onclick="' + onclick + '"class="btn btn-warning">' + '----' + '</button>';
                            if (t % 8 == 0) {
                                str += "<br><br>";
                            }
                            element.status="not able";
                            valid = valid - 1;
                        }
                    });

                    $("#schedule").html(str);
                }
            })
            ;


        }

        function booking() {
            let chooseDay = $("#chooseDay").val();
            if (chooseDay == "") {
                alert("Bạn chưa chọn ngày đặt lịch");
                return;
            }
            if (employeeId == "") {
                alert("Bạn chưa chọn nhân viên");
                return;
            }
            if (chooseTime == "") {
                alert("Bạn chưa chọn giờ");
                return;
            }

            let dateBooking = $("#chooseDay").val() + " " + chooseTime + ":00";
            $("#dateBooking").val($("#chooseDay").val() + " " + chooseTime + ":00");
            $("#employeeID").val(employeeId);
            $("#listService").val(listService);
            $("#totalTimeInput").val(time);
            document.getElementById("form-validation").submit();
        }

        function clickTime(key) {
            if (key == "") {
                alert("Giờ này đã có người đặt");
                chooseTime = "";
            } else {
                if(endBreak.includes(key)){
                    if(time > 30){
                        alert("Không đủ giờ làm");
                        chooseTime ="";
                    }
                    else {
                        chooseTime = key;
                    }
                }
                else{
                    let index =  arrLoad.findIndex(elment=>elment.time ==key);
                    let number =  (time / 30)-1;
                    let isValid = true;
                    for (let i = 1;i<=number;i++){
                        if(arrLoad[index+i].status =="not able"){
                            isValid = false;
                        }
                    }
                    if(isValid){
                        chooseTime = key;
                    }
                    else {
                        alert("Không đủ giờ làm");
                        chooseTime ="";
                    }
                }

            }

        }

    </script>
