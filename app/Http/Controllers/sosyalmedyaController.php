<?php

namespace App\Http\Controllers;
use App\Models\sosyalmedyaModel;
use Illuminate\Http\Request;

class sosyalmedyaController extends Controller
{
    public function sosyalmedya(){
        $sosyalmedya = $this->listele();
        return view('sosyalmedya', ['sosyalmedya' => $sosyalmedya]);
    }
    public function sosyalmedyaEkle(){
        return view('sosyalmedyaEkle');
    }
    public function listele(){
        return sosyalmedyaModel::select()->get();
    }

    public function sosyalmedyaEklendi(Request $request){
        $save = sosyalmedyaModel::updateOrCreate(
            ["medyaid" => $request->medyaid],
            [
                "medyaadi" => $request->medyaadi,
                "link" => $request->link,
                "icon" => $request->icon,
            ]
        );

        if($save->save()){
            return ['islemDurum' => 1];
        }else{
            return ['islemDurum' => 0];
        }
    }

    public function sosyalmedyaSil(Request $request){
        if(sosyalmedyaModel::find($request->medyaid)->delete()) {
            return ["islemDurum" => 1];
        }
        else {
            return ["islemDurum" => 0];
        }

    }
    public function sosyalmedyaGuncellen($medyaid)
    {
        $guncellen = sosyalmedyaModel::find($medyaid);
        return view("sosyalmedyaEkle", ["guncelle" => $guncellen]);
    }
    public function sosyalmedyaGuncelle(Request $request){
        $insert = sosyalmedyaModel::find($request->medyaid);
        $insert->medyaadi = $request->medyaadi;
        $insert->link = $request->link;
        $insert->icon = $request->icon;
        $insert->save();
        return self::Listele();
    }
}
