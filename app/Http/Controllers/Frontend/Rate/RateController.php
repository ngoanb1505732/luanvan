<?php


namespace App\Http\Controllers\Frontend\Rate;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhGia;
class RateController extends Controller
{
 public function CreateRate(Request $request){
     $danhGia = new DanhGia();
     $customerID =  $request->session()->get('customerID');
     if($customerID ==null){
         return redirect()->route('front-end.service.load',$request->dich_vu_id)->with("error","Bạn cần đăng nhập để đánh giá");
     }
     $danhGia->khach_hang_id = $customerID;
     $danhGia->dich_vu_id = $request->dich_vu_id;
     $danhGia->noi_dung =$request->noi_dung;
     $danhGia->diem = $request->diem;
     $danhGia->trang_thai = DanhGia::$STATUS["Chờ duyệt"];
     $danhGia->save();
     return redirect()->route('front-end.service.load',$request->dich_vu_id)->with('success', 'Thêm đánh giá thành công, đợi quản trị duyệt');
 }
}
