<?php


namespace App\Http\Controllers\Adminhtml\Order;


use App\Http\Controllers\Controller;
use App\Models\ChiTietHoaDon;
use App\Models\HoaDon;
use App\Models\PhieuDatCho;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $orders = HoaDon::all()->sortByDesc("created_at");
        return view('/adminhtml/order/index',  compact(["orders"]));
    }

    public function delete($id) {
        try{
            $order = \App\Models\HoaDon::findOrFail((int)$id);
            $order->delete();
            return redirect()->route('admin.order')->with('success', 'Xóa hoá đơn thành công!');
        }
        catch(Exception $e){
            return redirect()->route('admin.order')->with('error', 'Xóa hoá đơn thành công!');

        }
    }


    public function detail($id)
    {
        try {
            $order = \App\Models\HoaDon::findOrFail((int)$id);
            return view('/adminhtml/order/detail', compact(["order"]));
        } catch (Exception $e) {
            return $e;
        }
    }
}
