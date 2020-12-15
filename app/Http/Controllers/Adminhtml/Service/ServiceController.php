<?php


namespace App\Http\Controllers\Adminhtml\Service;


use App\Http\Controllers\Controller;
use App\Models\DichVu;
use App\Models\LieuTrinh;
use Illuminate\Http\Request;
use App\Models\LoaiDichVu;
use App\Models\HinhAnh;
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
        $trangthai = \App\Models\DichVu::$STATUS;
        $typeServices = LoaiDichVu::all();
        $process =LieuTrinh::all();
        return view('/adminhtml/service/create',compact(["trangthai","typeServices","process"]));

    }

    public function save(Request $request){
        try{
            $dichVu = new DichVu();
            $dichVu->ten_dich_vu = $request->ten_dich_vu;
            $dichVu->trang_thai =  $request->trang_thai;
            $dichVu->mo_ta = $request->mo_ta;
            $dichVu->loai_dich_vu_id = $request->loai_dich_vu_id;
            $dichVu->lieu_trinh_id = $request->lieu_trinh_id;
            if($request->anh_dai_dien){
                $request->validate([
                    'anh_dai_dien' => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
                ]);
                $fileName = time() . '.' . $request->anh_dai_dien->extension();
                $request->anh_dai_dien->move(public_path('file/dichVu'), $fileName);
                $url = "file/dichVu/".$fileName;
                $dichVu->anh_dai_dien = $url;
            }
            $dichVu->gia_tien = $request->gia_tien;
            $dichVu->thoi_gian = $request->thoi_gian;
            $dichVu->save();
            if($request->anh_lien_quan){
                foreach ($request->file("anh_lien_quan") as $item){
                    $fileName = $item->getFilename().time() . '.' . $item->extension();
                    $item->move(public_path('file/dichVu/anhlienquan'), $fileName);
                    $url = "file/dichVu/anhlienquan/".$fileName;
                    $anhlienquan = new HinhAnh();
                    $anhlienquan->dich_vu_id = $dichVu->dich_vu_id;
                    $anhlienquan->duong_dan = $url;
                    $anhlienquan->save();
         }
         }
            return redirect()->route('service')->with('success', 'Thêm liệu trình thành công!');;
        }
        catch(Exception $e){
            return redirect()->route('service')->with('error', 'Thêm liệu trình thất bại!');;

        }
    }

    public function delete($id) {
        try{
            $dichVu = \App\Models\DichVu::findOrFail((int)$id);
            File::delete($dichVu->anh_dai_dien);
            foreach ($dichVu->hinhAnh as $hinhanh){
                File::delete($hinhanh->duong_dan);
                $hinhanh->delete();
            }
            $dichVu->delete();
            return redirect()->route('service')->with('success', 'Xóa liệu trình thành công!');
        }
        catch(Exception $e){
            return redirect()->route('service')->with('error', 'Xóa liệu trình thất bại!');

        }

    }


    public function edit($id)
    {
        try {
            $process =LieuTrinh::all();
            $dichVu = \App\Models\DichVu::findOrFail((int)$id);
            $trangthai = \App\Models\DichVu::$STATUS;
            $loaiDichVu = LoaiDichVu::all();
            return view('/adminhtml/service/edit', compact(["dichVu","trangthai","loaiDichVu","process"]));
        } catch (Exception $e) {
            return $e;
        }
    }

    public function update(Request $request){
         try {
            $dichVu = \App\Models\DichVu::findOrFail((int)$request->dich_vu_id);
            $dichVu->ten_dich_vu = $request->ten_dich_vu;
            $dichVu->trang_thai = $request->trang_thai;
            $dichVu->mo_ta = $request->mo_ta;
            $dichVu->loai_dich_vu_id = $request->loai_dich_vu_id;
             $dichVu->lieu_trinh_id = $request->lieu_trinh_id;
            if($request->anh_dai_dien){
                if($dichVu->anh_dai_dien){
                    File::delete($dichVu->anh_dai_dien);
                }
                $request->validate([
                    'anh_dai_dien' => 'file|mimes:jpg,jpeg,bmp,png',
                ]);
                $fileName = time() . '.' . $request->anh_dai_dien->extension();
                $request->anh_dai_dien->move(public_path('file/dichVu'), $fileName);
                $url = "file/dichVu/".$fileName;
                $dichVu->anh_dai_dien = $url;
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
                     $item->move(public_path('file/dichVu/anhlienquan'), $fileName);
                     $url = "file/dichVu/anhlienquan/" . $fileName;
                     $anhlienquan = new HinhAnh();
                     $anhlienquan->dich_vu_id = $request->dich_vu_id;
                     $anhlienquan->duong_dan = $url;
                     $anhlienquan->save();
                 }
             }
            $dichVu->gia_tien = $request->gia_tien;
            $dichVu->thoi_gian = $request->thoi_gian;
            $dichVu->save();
            return redirect()->route('service')->with('success', 'Cập nhật liệu trình thành công!');
        } catch (Exception $e) {
            return redirect()->route('service')->with('error', 'Cập nhật liệu trình thất bại!');
        }
    }

}
