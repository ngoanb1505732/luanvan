<?php


namespace App\Http\Controllers\Adminhtml\Booking;


use App\Http\Controllers\Controller;
use App\Models\LoaiDichVu;
use App\Models\PhieuDatCho;
use App\Models\HoaDon;
use App\Models\ChiTietHoaDon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $bookings = PhieuDatCho::all()->sortByDesc("ngay_lam");
        return view('/adminhtml/booking/index',  compact(["bookings"]));
    }

    public function create(){

//        return view('/adminhtml/typeService/create');

    }

    public function save(Request $request){

    }

    public function delete($id) {
        try{
            $booking = \App\Models\PhieuDatCho::findOrFail((int)$id);
            $booking->delete();
            return redirect()->route('admin.booking')->with('success', 'Xóa lịch hẹn thành công!');
        }
        catch(Exception $e){
            return redirect()->route('admin.booking')->with('error', 'Xóa lịch hẹn thành công!');

        }
    }


    public function detail($id)
    {
        try {
            $booking = \App\Models\PhieuDatCho::findOrFail((int)$id);
            return view('/adminhtml/booking/detail', compact(["booking"]));
        } catch (Exception $e) {
            return $e;
        }
    }

    public function changeStatus(Request $request){
        $status=["Huỷ","Xác nhận"];
        $booking = \App\Models\PhieuDatCho::findOrFail((int)$request->id);
        $statusNumber = $request->status;
         if($booking->trang_thai =="Huỷ"){
             return redirect()->route('admin.booking.detail',$request->id)->with('error', 'Trạng thái hiện đang là Huỷ không thể đổi trạng thái');
         }
        if($statusNumber ==0){
            if($booking->trang_thai =="Chờ duyệt"){
                $booking->trang_thai = "Huỷ";
                $booking->save();
                return redirect()->route('admin.booking.detail',$request->id)->with('success', 'Huỷ lịch hẹn thành công');
            }
            else {
                return redirect()->route('admin.booking.detail',$request->id)->with('error', 'Trạng thái không phải là chờ duyệt nên không huỷ được');
            }
        }
        if($statusNumber ==1){
            if($booking->trang_thai =="Chờ duyệt"){
                $booking->trang_thai = "Xác nhận";
                $booking->save();
                return redirect()->route('admin.booking.detail',$request->id)->with('success', 'Xác nhận lịch hẹn thành công');
            }
            else {
                return redirect()->route('admin.booking.detail',$request->id)->with('error', 'Trạng thái không phải là chờ duyệt nên không thể xác nhận được');
            }
        }

        if($statusNumber ==2){
            if($booking->trang_thai =="Xác nhận"){
                $booking->trang_thai = "Hoàn tất";
                $booking->save();

                $hoaDon = new HoaDon();
                $hoaDon->phieu_dat_cho_id = $booking->phieu_dat_cho_id;
                $hoaDon->khach_hang_id = $booking->khach_hang_id;
                $hoaDon->nhan_vien_id = $booking->nhan_vien_id;
                $hoaDon->save();

                foreach($booking->datHen as $item){
                    $dichVu = $item->dichVu;
                    $chiTietHoaDon = new ChiTietHoaDon();
                    $chiTietHoaDon->dich_vu_id = $dichVu->dich_vu_id;
                    $chiTietHoaDon->so_luong = 1;
                    $chiTietHoaDon->gia_tien = $dichVu->gia_tien ;
                    $chiTietHoaDon->hoa_don_id = $hoaDon->hoa_don_id ;
                    $chiTietHoaDon->save();
                }

                return redirect()->route('admin.booking.detail',$request->id)->with('success', 'Hoạn thành lịch hẹn và tạo hoá thành công');
            }
            else {
                return redirect()->route('admin.booking.detail',$request->id)->with('error', 'Trạng thái không phải là xác nhận nên không thể hoàn thành lịch hẹn');
            }
        }

    }

}
