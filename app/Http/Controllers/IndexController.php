<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function Index(){
        $egitim = (new Egitimcontroller)->listele();
        $deneyim =(new deneyimcontroller)->listele();
        $yetkinlik =(new yetkinlikcontroller)->listele();
        $iletisim =(new iletisimcontroller)->listele();
        $sosyalmedya =(new sosyalmedyacontroller)->listele();
        $hakkimda =(new hakkimdacontroller)->listele();
        return view('index', ['egitim' => $egitim,'deneyim' => $deneyim,'yetkinlik' => $yetkinlik,'iletisim' => $iletisim,'sosyalmedya' => $sosyalmedya,'hakkimda' => $hakkimda]);
    }













}
