<?php


namespace App\Http\Controllers\Frontend\Customer;


use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use App\Models\LoaiDichVu;
use Illuminate\Http\Request;

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
}
