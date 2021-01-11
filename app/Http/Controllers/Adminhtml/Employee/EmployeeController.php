<?php


namespace App\Http\Controllers\Adminhtml\Employee;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use App\Models\PhieuDatCho;
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
            if(isset($request->anh)) {
                $request->validate([
                    'anh' => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
                ]);
                $fileName = time() . '.' . $request->anh->extension();
                $request->anh->move(public_path('file'), $fileName);
                $url = "file/".$fileName;
                $nhanvien->anh = $url;
            }
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

}


    public function edit($id)
    {
        try {
            $nhanvien = \App\Models\NhanVien::findOrFail((int)$id);
            return view('/adminhtml/employee/edit', compact(["nhanvien"]));
        } catch (Exception $e) {
            return $e;
        }
    }

        public function update(Request $request){
            try {
                 $nhanvien = \App\Models\NhanVien::findOrFail((int)$request->nhan_vien_id);
                $nhanvien->ho_ten = $request->ho_ten;
                $nhanvien->sdt = $request->sdt;
                $nhanvien->dia_chi = $request->dia_chi;
                $nhanvien->username = $request->username;
                $nhanvien->password = $request->password;
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
                return redirect()->route('employee')->with('success', 'Cập nhật nhân viên thành công!');;
            } catch (Exception $e) {
                return $e;
            }
        }
    public function schedule(){
        $employees = NhanVien::all();
        $day = date("Y-m-d")."";
//        $bookingDates = PhieuDatCho::all()->where("trang_thai","=","Xác nhận")
//            ->where("ngay_lam",">=",$day." 00:00:00")
//            ->where("ngay_lam","<=",$day." 23:59:59")
//        ;
        $bookingDates = PhieuDatCho::all()->whereIn("trang_thai",["Xác nhận","Hoàn tất"]);
        $schedule= "";
        foreach ($bookingDates as $item){
            $endDate= strtotime($item->ngay_lam.'+ '.$item->thoi_gian_lam.' minute');
            $endDate = date('Y-m-d H:i:s',$endDate);
           // $endDate = $endDate->format('Y-m-d H:i:s');
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
        return view('/adminhtml/booking/schedule',  compact(["employees","bookingDates","schedule"]));
    }
}
