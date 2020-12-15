<?php


namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use App\Models\LoaiDichVu;
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
}
