<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\egitimModel;
class Egitimcontroller extends Controller
{
    public function egitimm()
    {
        $egitim = $this->listele();
        return view('egitimm', ['egitimm' => $egitim]);
    }
    public function listele(){
        return egitimModel::select()->get();
    }
    public function egitimEkle(){
        return view('egitimEkle');
    }
    public function egitimEklendi(Request $request){
        $save = egitimModel::updateOrCreate(
            ["egitimİd" => $request->egitimİd],
            [
                "bolum" => $request->bolum,
                "okul" => $request->okul,
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

    public function egitimSil(Request $request){
        if(egitimModel::find($request->egitimİd)->delete()) {
            return ["islemDurum" => 1];
        }
        else {
            return ["islemDurum" => 0];
        }

    }

    public function guncelle(Request $request){
        $insert = egitimModel::find($request->egitimİd);
        $insert->bolum = $request->bolum;
        $insert->okul = $request->okul;
        $insert->tarih = $request->tarih;
        $insert->aciklama = $request->aciklama;
        $insert->save();
        return self::Listele();
    }

    public function guncellen($egitimId)
    {
        $guncellen = egitimModel::find($egitimId);
        return view("egitimEkle", ["guncelle" => $guncellen]);
    }
}
