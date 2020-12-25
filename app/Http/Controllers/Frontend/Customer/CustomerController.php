<?php


namespace App\Http\Controllers\Frontend\Customer;


use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use App\Models\LoaiDichVu;
use App\Models\PhieuDatCho;
use App\Models\HoaDon;
use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\Helpper;

class CustomerController extends Controller
{


    public function register() {
        $typeServices = LoaiDichVu::all();
        return view('/frontend/customer/register',  compact(["typeServices"]));
    }
    public function registerAction(Request $request){
        $khachhang = new KhachHang();
        $khachhang->ho_ten = $request->ho_ten;
        $khachhang->sdt = $request->sdt;
        $khachhang->dia_chi = $request->dia_chi;
        $khachhang->username = $request->username;
        $khachhang->password = $request->password;
        $khachhang->ngay_sinh = $request->ngay_sinh;
        $khachhang->save();

        return redirect()->route('customer.login')->with('success', 'Đăng ký khách hàng thành công!');
    }


    public function login(Request $request) {
        $typeServices = LoaiDichVu::all();
        return view('/frontend/customer/login',  compact(["typeServices"]));
    }

    public function loginAction(Request $request)
    {
        $customer = KhachHang::where('username', $request->username)->first();
        if ($customer != null) {
            if ($customer->password == $request->password) {
                $request->session()->put('customerID', $customer->khach_hang_id);
                $request->session()->put('username', $customer->username);
                return redirect()->route('front-end.index');
            }
        }
        return redirect()->route('customer.login')->with('error', 'Sai mật khẩu');
    }


    public function logout(Request $request) {
        $request->session()->forget('customerID');
        $request->session()->forget('username');
        $typeServices = LoaiDichVu::all();
        return redirect()->route('customer.login')->with('success', 'Đăng xuất thành công');
    }


    public function bookingHistory(Request $request,$clearCart) {
        $customerID =  $request->session()->get('customerID');
        if($customerID ==null){
            return redirect()->route('customer.login')->with("error","Bạn cần đăng nhập để xem thông tin");
        }
        $typeServices = LoaiDichVu::all();
        $bookings = PhieuDatCho::where("khach_hang_id","=",$customerID)
            ->orderByDesc("ngay_lam")->paginate(5);
        $boolean = $clearCart =="true";
        return view('/frontend/customer/bookingHistory',  compact(["typeServices","bookings","boolean"]));
    }

    public function updateInfo(Request $request) {
        $typeServices = LoaiDichVu::all();
        $customerID =  $request->session()->get('customerID');
        $customer = KhachHang::find($customerID);
        return view('/frontend/customer/updateInfo',  compact(["typeServices","customer"]));
    }

    public function updateInfoAction(Request $request) {
           $customerID =  $request->session()->get('customerID');
        $customer = KhachHang::find($customerID);
        $customer->ho_ten = $request->ho_ten;
        $customer->sdt = $request->sdt;
        $customer->dia_chi = $request->dia_chi;
        $customer->ngay_sinh = $request->ngay_sinh;
        $customer->save();
        return redirect()->route('customer.updateInfo')->with('success', 'Cập nhật thành công');
    }


    public function updatePassword(Request $request) {
        $customerID =  $request->session()->get('customerID');
        $customer = KhachHang::find($customerID);
        if($customer->password != $request->password_current){
            return redirect()->route('customer.updateInfo')->with('error', 'Nhập sai mật khẩu');

        }
        $customer->password = $request->password_new;
        $customer->save();
        return redirect()->route('customer.updateInfo')->with('success', 'Cập nhật thành công');
    }


    public function bookingHistoryDetail(Request $request,$id){
        $typeServices = LoaiDichVu::all();
        $customerID =  $request->session()->get('customerID');
        $booking =  PhieuDatCho::where("khach_hang_id","=",$customerID)
            ->where("phieu_dat_cho_id",$id)->first();
        return view('/frontend/customer/historyBookingDetail',  compact(["typeServices","booking"]));

    }

    public function historyOrder(Request  $request){
        $typeServices = LoaiDichVu::all();
        $customerID =  $request->session()->get('customerID');
         $orders = HoaDon::where("khach_hang_id","=",$customerID)->paginate(5);
        return view('/frontend/customer/historyOrder',  compact(["typeServices","orders"]));

    }

    public function historyOrderDetail(Request $request,$id){
        $typeServices = LoaiDichVu::all();
        $customerID =  $request->session()->get('customerID');
        $order = HoaDon::find($id);
        return view('/frontend/customer/historyOrderDetail',  compact(["typeServices","order"]));

    }

}
