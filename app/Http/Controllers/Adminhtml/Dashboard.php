<?php


namespace App\Http\Controllers\Adminhtml;

use App\Http\Controllers\Controller;
use App\Models\ChiTietHoaDon;
use App\Models\DichVu;
use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\NhanVien;
class Dashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = NhanVien::all();
        $customers  = KhachHang::all();
        $orders  = HoaDon::all();
        $services = DichVu::all();
        $totalPrice = 0;
        $detailOrders= ChiTietHoaDon::all();
        foreach ($detailOrders as $detailOrder){
            $totalPrice+= (int)$detailOrders->gia_tien;
        }
        return view('/adminhtml/dashboard/index', compact(["employees","customers","orders","services","totalPrice"]));
    }

}







