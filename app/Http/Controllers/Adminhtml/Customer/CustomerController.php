<?php


namespace App\Http\Controllers\Adminhtml\Customer;


use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $customers = KhachHang::all();
        return view('/adminhtml/customer/index',  compact(["customers"]));
    }

    public function create(){

        return view('/adminhtml/customer/create');

    }

    public function save(Request $request){
        try{
            $khachhang = new KhachHang();
            $khachhang->ho_ten = $request->ho_ten;
            $khachhang->sdt = $request->sdt;
            $khachhang->dia_chi = $request->dia_chi;
            $khachhang->username = $request->username;
            $khachhang->password = $request->password;
            $khachhang->ngay_sinh = $request->ngay_sinh;
            $khachhang->save();
            return redirect()->route('customer')->with('success', 'Thêm khách hàng thành công!');;
        }
        catch(Exception $e){
            return redirect()->route('customer')->with('error', 'Thêm khách hàng thất bại!');;

        }
    }

    public function delete($id) {
        try{
            $khachhang = \App\Models\KhachHang::findOrFail((int)$id);
            $khachhang->delete();
            return redirect()->route('customer')->with('success', 'Xóa khách hàng thành công!');
        }
        catch(Exception $e){
            return redirect()->route('customer')->with('error', 'Xóa khách hàng thất bại!');

        }

    }


    public function edit($id)
    {
        try {
            $khachhang = \App\Models\KhachHang::findOrFail((int)$id);
            return view('/adminhtml/customer/edit', compact(["khachhang"]));
        } catch (Exception $e) {
            return $e;
        }
    }

    public function update(Request $request){
        try {
            $khachhang = \App\Models\KhachHang::findOrFail((int)$request->khach_hang_id);
            $khachhang->ho_ten = $request->ho_ten;
            $khachhang->sdt = $request->sdt;
            $khachhang->dia_chi = $request->dia_chi;
            $khachhang->username = $request->username;
            $khachhang->password = $request->password;
            $khachhang->ngay_sinh = $request->ngay_sinh;


            $khachhang->save();
            return redirect()->route('customer')->with('success', 'Cập nhật khách hàng thành công!');
        } catch (Exception $e) {
            return redirect()->route('customer')->with('error', 'Cập nhật khách hàng thất bại!');
        }
    }

}
