<?php


namespace App\Http\Controllers\Adminhtml\Process;


use App\Http\Controllers\Controller;
use App\Models\LieuTrinh;
use Illuminate\Http\Request;
use App\Models\DichVu;
use App\Models\HinhAnh;
use Illuminate\Support\Facades\File;

class ProcessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $process = LieuTrinh::all();
        return view('/adminhtml/progress/index',  compact(["process"]));
    }

    public function create(){
        $trangthai = \App\Models\LieuTrinh::$STATUS;
        $dichvu = DichVu::all();
        return view('/adminhtml/progress/create',compact(["trangthai","dichvu"]));

    }

    public function save(Request $request){
        try{
            $lieutrinh = new LieuTrinh();
            $lieutrinh->ten_lieu_trinh = $request->ten_lieu_trinh;
            $lieutrinh->trang_thai =  $request->trang_thai;
            $lieutrinh->mo_ta = $request->mo_ta;
            $lieutrinh->dich_vu_id = $request->dich_vu_id;
            if($request->anh_dai_dien){
                $request->validate([
                    'anh_dai_dien' => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
                ]);
                $fileName = time() . '.' . $request->anh_dai_dien->extension();
                $request->anh_dai_dien->move(public_path('file/lieutrinh'), $fileName);
                $url = "file/lieutrinh/".$fileName;
                $lieutrinh->anh_dai_dien = $url;
            }
            $lieutrinh->gia_tien = $request->gia_tien;
            $lieutrinh->thoi_gian = $request->thoi_gian;
            $lieutrinh->save();
            if($request->anh_lien_quan){
                foreach ($request->file("anh_lien_quan") as $item){
                    $fileName = time() . '.' . $item->extension();
                    $item->move(public_path('file/lieutrinh/anhlienquan'), $fileName);
                    $url = "file/lieutrinh/anhlienquan/".$fileName;
                    $anhlienquan = new HinhAnh();
                    $anhlienquan->lieu_trinh_id = $lieutrinh->lieu_trinh_id;
                    $anhlienquan->duong_dan = $url;
                    $anhlienquan->save();
         }
         }
            return redirect()->route('process')->with('success', 'Thêm liệu trình thành công!');;
        }
        catch(Exception $e){
            return redirect()->route('process')->with('error', 'Thêm liệu trình thất bại!');;

        }
    }

    public function delete($id) {
        try{
            $lieutrinh = \App\Models\LieuTrinh::findOrFail((int)$id);
            File::delete($lieutrinh->anh_dai_dien);
            foreach ($lieutrinh->hinhAnh as $hinhanh){
                File::delete($hinhanh->duong_dan);
                $hinhanh->delete();
            }
            $lieutrinh->delete();
            return redirect()->route('process')->with('success', 'Xóa liệu trình thành công!');
        }
        catch(Exception $e){
            return redirect()->route('process')->with('error', 'Xóa liệu trình thất bại!');

        }

    }


    public function edit($id)
    {
        try {
            $lieutrinh = \App\Models\LieuTrinh::findOrFail((int)$id);
            $trangthai = \App\Models\LieuTrinh::$STATUS;
            $dichvu = DichVu::all();
            return view('/adminhtml/progress/edit', compact(["lieutrinh","trangthai","dichvu"]));
        } catch (Exception $e) {
            return $e;
        }
    }

    public function update(Request $request){
         try {
            $lieutrinh = \App\Models\LieuTrinh::findOrFail((int)$request->lieu_trinh_id);
            $lieutrinh->ten_lieu_trinh = $request->ten_lieu_trinh;
            $lieutrinh->trang_thai = $request->trang_thai;
            $lieutrinh->mo_ta = $request->mo_ta;
            $lieutrinh->dich_vu_id = $request->dich_vu_id;
            if($request->anh_dai_dien){
                if($lieutrinh->anh_dai_dien){
                    File::delete($lieutrinh->anh_dai_dien);
                }
                $request->validate([
                    'anh_dai_dien' => 'file|mimes:jpg,jpeg,bmp,png',
                ]);
                $fileName = time() . '.' . $request->anh_dai_dien->extension();
                $request->anh_dai_dien->move(public_path('file/lieutrinh'), $fileName);
                $url = "file/lieutrinh/".$fileName;
                $lieutrinh->anh_dai_dien = $url;
            }

            if($request->delete_anh_id !=""){
              $listAnh =  explode(",",$request->delete_anh_id);
              foreach ($listAnh as $anhId){
               $anh =  \App\Models\HinhAnh::findOrFail((int)$anhId);
                  File::delete($anh->duong_dan);
                  $anh->delete();
              }
            }

             if($request->anh_lien_quan) {
                 foreach ($request->file("anh_lien_quan") as $item) {
                     $fileName = $item->getFilename().time() . '.' . $item->extension();
                     $item->move(public_path('file/lieutrinh/anhlienquan'), $fileName);
                     $url = "file/lieutrinh/anhlienquan/" . $fileName;
                     $anhlienquan = new HinhAnh();
                     $anhlienquan->lieu_trinh_id = $request->lieu_trinh_id;
                     $anhlienquan->duong_dan = $url;
                     $anhlienquan->save();
                 }
             }
            $lieutrinh->gia_tien = $request->gia_tien;
            $lieutrinh->thoi_gian = $request->thoi_gian;
            $lieutrinh->save();
            return redirect()->route('process')->with('success', 'Cập nhật liệu trình thành công!');
        } catch (Exception $e) {
            return redirect()->route('process')->with('error', 'Cập nhật liệu trình thất bại!');
        }
    }

}
