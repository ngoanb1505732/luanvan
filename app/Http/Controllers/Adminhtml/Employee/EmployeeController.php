<?php


namespace App\Http\Controllers\Adminhtml\Employee;


use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use Illuminate\Http\Request;
class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $employees = NhanVien::all();
        return view('/adminhtml/employee/index',  compact(["employees"]));
    }

    public function create(){

        return view('/adminhtml/employee/create');

    }

public function save(Request $request){
    try{
    $nhanvien = new NhanVien();
    $nhanvien->ho_ten = $request->ho_ten;
    $nhanvien->sdt = $request->sdt;
    $nhanvien->dia_chi = $request->dia_chi;
    $nhanvien->username = $request->username;
    $nhanvien->password = $request->password;
    $nhanvien->ngay_sinh = $request->ngay_sinh;
    $nhanvien->save();
    return redirect()->route('employee')->with('success', 'Thêm nhân viên thành công!');;    
    }
    catch(Exception $e){
        return redirect()->route('employee')->with('error', 'Thêm nhân viên thất bại!');;    

    }
}

public function delete($id) {
try{
    $nhanvien = \App\Models\NhanVien::findOrFail((int)$id);
    $nhanvien->delete();
    return redirect()->route('employee')->with('success', 'Xóa nhân viên thành công!');   
}
catch(Exception $e){
    return redirect()->route('employee')->with('error', 'Xóa nhân viên thất bại!');   

}

// $nhanvien = NhanVien()::find((int)$id);
// print_r($nhanvien);
    
}
}
