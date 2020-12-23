<?php


namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use App\Models\LoaiDichVu;
use App\Models\PhieuDatCho;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class ActionController extends Controller
{
    public function index() {
        $typeServices = LoaiDichVu::all();
        return view('/frontend/index',  compact(["typeServices"]));
    }
    public function api(Request $request){
        switch ($request->action) {
            case "checkCustomerExist":
             return $this->checkCustomerExist($request->username);
            break;
            case"getScheduleByEmployee":
                return $this->getScheduleByEmployee($request->employeeID,$request->date);
        }

    }

    protected function checkCustomerExist($username){
        if($username != null && $username != ""){
            $customer = KhachHang::where('username', $username)->first();
            if($customer != null){
                return "true";
            }
            return "false";
        }
        return "false";
    }


    protected function getScheduleByEmployee($employeeID,$date){
        $arr =[];
        $splitDate =explode(" ",$date);
        $endDate = $splitDate[0]." 23:59:59";
        if($employeeID != null && $employeeID != ""){
            $schedules = PhieuDatCho::where('nhan_vien_id', $employeeID);
            $schedules->where("ngay_lam",">=",$date);
            $schedules->where("ngay_lam","<=",$endDate);
            $schedules->where("trang_thai","!=","Huỷ");
           foreach ($schedules->get() as $item){
               $splitDateItem =explode(" ",$item->ngay_lam);

               $arr[substr($splitDateItem[1], 0, 5)] = $item->thoi_gian_lam;
//                       array_push($arr,
//                           array(
//                               "gio_lam"=>substr($splitDateItem[1], 0, 5),
//                               "thoi_gian_lam"=>$item->thoi_gian_lam,
//                           )
//                           );
           }
        }
        return $arr;
    }
}
