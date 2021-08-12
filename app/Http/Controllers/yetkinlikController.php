<?php

namespace App\Http\Controllers;
use App\Models\yetkinlikModel;
use Illuminate\Http\Request;

class yetkinlikController extends Controller
{
    public function yetkinlik(){
        $yetkinlik = $this->listele();
        return view('yetkinlik', ['yetkinlik' => $yetkinlik]);
    }

    public function listele(){
        return yetkinlikModel::select()->get();
    }

    public function yetkinlikEkle(){
        return view('yetkinlikEkle');
    }

    public function yetkinlikEklendi(Request $request){
        $save = yetkinlikModel::updateOrCreate(
            ["yetkinlikid" => $request->yetkinlikid],
            [
                "yetkinlikadi" => $request->yetkinlikadi,
                "seviye" => $request->seviye,
            ]
        );

        if($save->save()){
            return ['islemDurum' => 1];
        }else{
            return ['islemDurum' => 0];
        }
    }
    public function yetkinlikSil(Request $request){
        if(yetkinlikModel::find($request->yetkinlikid)->delete()) {
            return ["islemDurum" => 1];
        }
        else {
            return ["islemDurum" => 0];
        }

    }
    public function yetkinlikGuncellen($yetkinlikid)
    {
        $guncellen = yetkinlikModel::find($yetkinlikid);
        return view("yetkinlikEkle", ["guncelle" => $guncellen]);
    }
    public function yetkinlikGuncelle(Request $request){
        $insert = yetkinlikModel::find($request->yetkinlikid);
        $insert->yetkinlikadi = $request->yetkinlikadi;
        $insert->seviye = $request->seviye;
        $insert->save();
        return self::Listele();
    }
}
