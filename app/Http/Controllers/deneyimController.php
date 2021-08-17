<?php

namespace App\Http\Controllers;
use App\Models\deneyimModel;
use Illuminate\Http\Request;

class deneyimController extends Controller
{
    public function deneyim(){
        $deneyim = $this->listele();
        return view('deneyim', ['deneyim' => $deneyim]);
    }

    public function listele(){
        return deneyimModel::select()->get();
    }

    public function deneyimEkle(){
        return view('deneyimEkle');
    }

    public function deneyimEklendi(Request $request){

        $save = deneyimModel::updateOrCreate(
            ["deneyimid" => $request->deneyimid],
            [
                "pozisyon" => $request->pozisyon,
                "calismayeri" => $request->calismayeri,
                "tarih" => $request->tarih,
                "aciklama" => nl2br($request->aciklama)

            ]
        );

        if($save->save()){
            return ['islemDurum' => 1];
        }else{
            return ['islemDurum' => 0];
        }
    }
    public function deneyimSil(Request $request){
        if(deneyimModel::find($request->deneyimid)->delete()) {
            return ["islemDurum" => 1];
        }
        else {
            return ["islemDurum" => 0];
        }

    }
    public function getupdate(Request $request){
        $insert = deneyimModel::find($request->deneyimid);
        $insert->pozisyon = $request->pozisyon;
        $insert->calismayeri = $request->calismayeri;
        $insert->tarih = $request->tarih;
        $insert->aciklama = $request->aciklama;
        $insert->save();
        return self::Listele();
    }
    public function setupdate($deneyimid)
    {
        $guncellen = deneyimModel::find($deneyimid);
        return view("deneyimEkle", ["guncelle" => $guncellen]);
    }
}
