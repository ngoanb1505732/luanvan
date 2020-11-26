<?php


namespace App\Http\Controllers\Adminhtml\Service;


use App\Http\Controllers\Controller;
use App\Models\DichVu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $services = DichVu::all();
        return view('/adminhtml/service/index',  compact(["services"]));
    }

    public function create(){

        return view('/adminhtml/service/create');

    }

    public function save(Request $request){
        try{
            $dichvu = new DichVu();
            $dichvu->ten_dich_vu = $request->ten_dich_vu;
            $dichvu->dien_giai = $request->dien_giai;
            $dichvu->save();
            return redirect()->route('service')->with('success', 'Thêm dịch vụ thành công!');
        }
        catch(Exception $e){
            return redirect()->route('service')->with('error', 'Thêm dịch vụ thất bại!');
        }
    }

    public function delete($id) {
        try{
            $dichvu = \App\Models\DichVu::findOrFail((int)$id);
            $dichvu->delete();
            return redirect()->route('service')->with('success', 'Xóa dịch vụ thành công!');
        }
        catch(Exception $e){
            return redirect()->route('service')->with('error', 'Xóa dịch vụ thất bại!');

        }

    }


    public function edit($id)
    {
        try {
            $dichvu = \App\Models\DichVu::findOrFail((int)$id);
            return view('/adminhtml/service/edit', compact(["dichvu"]));
        } catch (Exception $e) {
            return $e;
        }
    }

    public function update(Request $request){
        try {
            $dichvu = \App\Models\DichVu::findOrFail((int)$request->dich_vu_id);
            $dichvu->ten_dich_vu = $request->ten_dich_vu;
            $dichvu->dien_giai = $request->dien_giai;
            $dichvu->save();
            return redirect()->route('service')->with('success', 'Cập nhật dịch vụ thành công!');
        } catch (Exception $e) {
            return redirect()->route('service')->with('error', 'Cập nhật dịch vụ thất bại!');

        }
    }

}
