<?php


namespace App\Http\Controllers\Adminhtml\Rate;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhGia;
class RateController extends Controller
{
 public function complete($id){
     $danhGia = \App\Models\DanhGia::findOrFail((int)$id);
     $danhGia->trang_thai = DanhGia::$STATUS["Xác nhận"];
     $danhGia->save();
     return redirect()->route('admin.rate.detail',$id)->with('success', 'Đã xác nhận đánh giá thành công');
 }

    public function cancel($id){
        $danhGia = \App\Models\DanhGia::findOrFail((int)$id);
        $danhGia->trang_thai = DanhGia::$STATUS["Huỷ"];
        $danhGia->save();
        return redirect()->route('admin.rate.detail',$id)->with('success', 'Đã huỷ đánh giá thành công');
    }
 public function index(){
     $rates = \App\Models\DanhGia::all();
     return view('/adminhtml/rate/index',  compact(["rates"]));
 }

    public function detail($id){
        $danhGia = \App\Models\DanhGia::findOrFail((int)$id);
        return view('/adminhtml/rate/detail',  compact(["danhGia"]));
    }

    public function delete($id){
        $rates = \App\Models\DanhGia::findOrFail((int)$id);
        try{
            $rates->delete();
            return redirect()->route('admin.rate')->with('success', 'Xoá đánh giá thành công');

        }
        catch (\Exception $e){
            $rates->delete();
            return redirect()->route('admin.rate')->with('error', 'Lỗi xoá đánh giá ');
        }

    }
}
