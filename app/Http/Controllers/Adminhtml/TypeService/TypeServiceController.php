<?php


namespace App\Http\Controllers\Adminhtml\TypeService;


use App\Http\Controllers\Controller;
use App\Models\LoaiDichVu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TypeServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $typeServices = LoaiDichVu::all();
        return view('/adminhtml/typeService/index',  compact(["typeServices"]));
    }

    public function create(){

        return view('/adminhtml/typeService/create');

    }

    public function save(Request $request){
        try{
            $loaidichvu = new LoaiDichVu();
            $loaidichvu->ten_loai_dich_vu = $request->ten_loai_dich_vu;
            $loaidichvu->dien_giai = $request->dien_giai;
            $loaidichvu->save();
            return redirect()->route('typeService')->with('success', 'Thêm loại dịch vụ thành công!');
        }
        catch(Exception $e){
            return redirect()->route('typeService')->with('error', 'Thêm loại dịch vụ thất bại!');
        }
    }

    public function delete($id) {
        try{
            $loaidichvu = \App\Models\LoaiDichVu::findOrFail((int)$id);
            $loaidichvu->delete();
            return redirect()->route('typeService')->with('success', 'Xóa loại dịch vụ thành công!');
        }
        catch(Exception $e){
            return redirect()->route('typeService')->with('error', 'Xóa loại dịch vụ thất bại!');

        }

    }


    public function edit($id)
    {
        try {
            $loaidichvu = \App\Models\LoaiDichVu::findOrFail((int)$id);
            return view('/adminhtml/typeService/edit', compact(["loaidichvu"]));
        } catch (Exception $e) {
            return $e;
        }
    }

    public function update(Request $request){
        try {
            $loaidichvu = \App\Models\LoaiDichVu::findOrFail((int)$request->loai_dich_vu_id);
            $loaidichvu->ten_loai_dich_vu = $request->ten_loai_dich_vu;
            $loaidichvu->dien_giai = $request->dien_giai;
            $loaidichvu->save();
            return redirect()->route('typeService')->with('success', 'Cập nhật loại dịch vụ thành công!');
        } catch (Exception $e) {
            return redirect()->route('typeService')->with('error', 'Cập nhật loại dịch vụ thất bại!');

        }
    }

}
