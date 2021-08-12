<?php

namespace App\Http\Controllers;
use App\Models\hakkimdaModel;
use Illuminate\Http\Request;

class hakkimdaController extends Controller
{
    public function hakkimda(){
        $hakkimda = $this->listele();
        return view('hakkimda', ['hakkimda' => $hakkimda]);
    }
    public function hakkimdaEkle(){
        $hakkimda = $this->listele();
        return view('hakkimdaEkle',  ['guncelle' => $hakkimda]);
    }
    public function listele(){
        return hakkimdaModel::select()->first();
    }
    public function hakkimdaEklendi(Request $request){

        $fotoName = "";
        if($request->foto != "undefined") {
            $fotoName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('assets/images/faces/'), $fotoName);
        }
        $save = hakkimdaModel::updateOrCreate(
            ["hakkimdaid" => $request->hakkimdaid],
            [
                "ad" => $request->ad,
                "unvan" => $request->unvan,
                "aciklama" => $request->aciklama,
                "foto" => $fotoName
            ]
        );

        if($save->save()){
            return ['islemDurum' => 1];
        }else{
            return ['islemDurum' => 0];
        }
    }

}
