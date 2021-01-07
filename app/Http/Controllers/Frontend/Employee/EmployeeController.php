<?php


namespace App\Http\Controllers\Frontend\Employee;


use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use App\Models\PhieuDatCho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{

    public function login(Request $request){
   $employeeID = $request->session()->get('employeeID');
    if($employeeID !=null && $employeeID !=""){
        return redirect()->route('employee.updateInfo');
    }
    return view('/frontend/employee/login');
    }

    public function loginAction(Request $request){
    $employee = NhanVien::where('username', $request->username)->first();
    if ($employee != null) {
        if ($employee->password == $request->password) {
            $request->session()->put('employeeID', $employee->nhan_vien_id);
            return redirect()->route('employee.updateInfo');
        }
    }

    return redirect()->route('employee.login')->with('error', 'Sai mật khẩu');

}



    public function updateInfo(Request $request){

        $employeeID = $request->session()->get('employeeID');
        if($employeeID ==null || $employeeID ==""){
            return redirect()->route('employee.login');
        }
        $nhanvien = NhanVien::find($employeeID);
        return view('/frontend/employee/updateInfo', compact(["nhanvien"]));
    }


    public function logout(Request $request) {
        $request->session()->forget('employeeID');
        return redirect()->route('employee.login')->with('success', 'Đăng xuất thành công');
    }

    public function updateInfoAction(Request $request){
        try {
            $employeeID = $request->session()->get('employeeID');
            if($employeeID ==null || $employeeID ==""){
                return redirect()->route('employee.login');
            }
            $nhanvien = \App\Models\NhanVien::findOrFail((int)$employeeID);
            $nhanvien->sdt = $request->sdt;
            $nhanvien->dia_chi = $request->dia_chi;
            $nhanvien->ngay_sinh = $request->ngay_sinh;
            if(isset($request->anh)) {
                $request->validate([
                    'anh' => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
                ]);
                if(isset($nhanvien->anh))
                {
                    $fileName = $nhanvien->anh;
                    $fileName = str_replace("file/","",$fileName);
                    File::delete($nhanvien->anh);
                }
                else {
                    $fileName = time() . '.' . $request->anh->extension();

                }
                $request->anh->move(public_path('file'), $fileName);
                $url = "file/".$fileName;
                $nhanvien->anh = $url;
            }
            $nhanvien->save();
            return redirect()->route('employee.updateInfo')->with('success', 'Thay đổi thông tin thành công!');;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function schedule(Request  $request){
        $employeeID = $request->session()->get('employeeID');
        if($employeeID ==null || $employeeID ==""){
            return redirect()->route('employee.login');
        }

        $bookingDates = PhieuDatCho::all()->where("trang_thai","in",["Xác nhận","Hoàn tất"])
        ->where("nhan_vien_id","=",$employeeID)
        ;
        $schedule= "";
        $employee=NhanVien::find($employeeID);
        foreach ($bookingDates as $item){
            $endDate= strtotime($item->ngay_lam.'+ '.$item->thoi_gian_lam.' minute');
            $endDate = date('Y-m-d H:i:s',$endDate);
            $text="";
            $dichVu = "";
            foreach ($item->datHen as $datHen){
                $dichVu = (($dichVu =="")? $dichVu .$datHen->dichVu->ten_dich_vu : $dichVu." ; " .$datHen->dichVu->ten_dich_vu );
            }

            $text="#".$item->phieu_dat_cho_id;
            $schedule=$schedule."{start_date:'".$item->ngay_lam
                . "',end_date:'".$endDate
                ."',section_id:".$item->nhan_vien_id
                .",text:'".$text."',id:".$item->phieu_dat_cho_id
                .",nhan_vien:'".$item->nhanVien->ho_ten
                ."',ngay_lam:'".$item->ngay_lam."',".
                "khach_hang:'".$item->khachHang->ho_ten."',".
                "dich_vu:'".$dichVu."'"
                ."},";
        }
        return view('/frontend/employee/schedule',  compact(["employee","schedule"]));

    }
    public function updatePassword(Request $request){
        $employeeID = $request->session()->get('employeeID');
        if($employeeID ==null || $employeeID ==""){
            return redirect()->route('employee.login');
        }
        return view('/frontend/employee/updatePassword');

    }

    public function updatePasswordAction(Request $request){
        $employeeID = $request->session()->get('employeeID');
        if($employeeID ==null || $employeeID ==""){
            return redirect()->route('employee.login');
        }

        $employee = NhanVien::find($employeeID);
        if($employee->password != $request->password_current){
            return redirect()->route('employee.updatePassword')->with('error', 'Nhập sai mật khẩu');

        }
        $employee->password = $request->password_new;
        $employee->save();
        return redirect()->route('employee.updatePassword')->with('success', 'Cập nhật thành công');
    }
}
