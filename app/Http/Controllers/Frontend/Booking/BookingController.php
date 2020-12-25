<?php


namespace App\Http\Controllers\Frontend\Booking;


use App\Http\Controllers\Controller;
use App\Models\PhieuDatCho;
use App\Models\DatHen;
use App\Models\LoaiDichVu;
use App\Models\NhanVien;
use Illuminate\Http\Request;

class BookingController extends Controller
{
   public function load(){
       $typeServices = LoaiDichVu::all();
       $employee = NhanVien::all();
       return view('/frontend/booking/load',  compact(["typeServices","employee"]));
   }

    public function booking(Request $request){
        $customerID =  $request->session()->get('customerID');
        if($customerID ==null){
            return redirect()->route('customer.login')->with("error","Bạn cần đăng nhập để xem thông tin");
        }
        $customerID = $request->session()->get('customerID');
        $phieuDatCho = new PhieuDatCho();
        $phieuDatCho->trang_thai = \App\Models\PhieuDatCho::$STATUS["Chờ duyêt"];
        $phieuDatCho->khach_hang_id = $customerID;
        $phieuDatCho->nhan_vien_id = $request->employeeID;
        $phieuDatCho->ngay_lam = $request->dateBooking;
        $phieuDatCho->thoi_gian_lam = $request->totalTimeInput;
        $phieuDatCho->save();
        $arr = explode(",",$request->listService);
        foreach ($arr as $item){
            $datHen = new DatHen();
            $datHen->phieu_dat_cho_id = $phieuDatCho->phieu_dat_cho_id;
            $datHen->dich_vu_id = $item;
            $datHen->save();
        }
        return redirect()->route('customer.bookingHistory',"true")->with('success', 'Đặt lịch thành công');
    }
}

