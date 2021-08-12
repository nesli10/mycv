<?php

namespace App\Http\Controllers;
use App\Models\iletisimModel;
use Illuminate\Http\Request;

class iletisimController extends Controller
{
    public function iletisim(){
        $iletisim = $this->listele();
        return view('iletisim', ['iletisim' => $iletisim]);
    }
    public function listele(){
        return iletisimModel::select()->get();
    }
    public function iletisimEkle(){
        return view('iletisimEkle');
    }
    public function iletisimEklendi(Request $request){
        $save = iletisimModel::updateOrCreate(
            ["iletisimid" => $request->iletisimid],
            [
                "adres" => $request->adres,
                "telefon" => $request->telefon,
                "email" => $request->email,
            ]
        );

        if($save->save()){
            return ['islemDurum' => 1];
        }else{
            return ['islemDurum' => 0];
        }
    }
    public function iletisimSil(Request $request){
        if(iletisimModel::find($request->iletisimid)->delete()) {
            return ["islemDurum" => 1];
        }
        else {
            return ["islemDurum" => 0];
        }

    }
    public function iletisimGuncellen($iletisimid)
    {
        $guncellen = iletisimModel::find($iletisimid);
        return view("iletisimEkle", ["guncelle" => $guncellen]);
    }
    public function iletisimGuncelle(Request $request){
        $insert = iletisimModel::find($request->iletisimid);
        $insert->adres = $request->adres;
        $insert->telefon = $request->telefon;
        $insert->email = $request->email;
        $insert->save();
        return self::Listele();
    }
}
