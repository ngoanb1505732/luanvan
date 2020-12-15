<?php


namespace App\Http\Controllers\Adminhtml\Process;


use App\Http\Controllers\Controller;
use App\Models\LieuTrinh;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $process = LieuTrinh::all();
        return view('/adminhtml/process/index',  compact(["process"]));
    }

    public function create(){

        return view('/adminhtml/process/create');

    }

    public function save(Request $request){
        try{
            $process = new LieuTrinh();
            $process->ten_lieu_trinh = $request->ten_lieu_trinh;
            $process->dien_giai = $request->dien_giai;
            $process->save();
            return redirect()->route('process')->with('success', 'Thêm liệu trình thành công!');
        }
        catch(Exception $e){
            return redirect()->route('process')->with('error', 'Thêm liệu trình thất bại!');
        }
    }

    public function delete($id) {
        try{
            $process = \App\Models\LieuTrinh::findOrFail((int)$id);
            $process->delete();
            return redirect()->route('process')->with('success', 'Xóa liệu trình thành công!');
        }
        catch(Exception $e){
            return redirect()->route('process')->with('error', 'Xóa liệu trình thất bại!');

        }

    }


    public function edit($id)
    {
        try {
            $lieuTrinh = \App\Models\LieuTrinh::findOrFail((int)$id);
            return view('/adminhtml/process/edit', compact(["lieuTrinh"]));
        } catch (Exception $e) {
            return $e;
        }
    }

    public function update(Request $request){
        try {
            $process = \App\Models\LieuTrinh::findOrFail((int)$request->lieu_trinh_id);
            $process->ten_lieu_trinh = $request->ten_lieu_trinh;
            $process->dien_giai = $request->dien_giai;
            $process->save();
            return redirect()->route('process')->with('success', 'Cập nhật liệu trình thành công!');
        } catch (Exception $e) {
            return redirect()->route('process')->with('error', 'Cập nhật liệu trình thất bại!');

        }
    }

}
