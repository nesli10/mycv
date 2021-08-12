<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EgitimController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IndexController;
use \App\Http\Controllers\deneyimController;
use \App\Http\Controllers\yetkinlikController;
use \App\Http\Controllers\hakkimdaController;
use \App\Http\Controllers\iletisimController;
use \App\Http\Controllers\sosyalmedyaController;

Route::get('/',[IndexController::class, 'Index']);

Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('/', [AdminController::class, 'admin'])->name('adminn');
    Route::get('/egitimm', [EgitimController::class, 'egitimm'])->name('egitimm');
    Route::get('/egitimEkle', [EgitimController::class, 'egitimEkle'])->name('egitimEkle');
    Route::post('/egitimEklendi', [EgitimController::class, 'egitimEklendi'])->name('egitimEklendi');
    Route::get('/egitimEkle', [EgitimController::class, 'egitimEkle'])->name('egitimEkle');
    Route::post('/egitimSil', [EgitimController::class, 'egitimSil'])->name("egitimSil");
    Route::post('/guncelle', [Egitimcontroller::class, 'guncelle'])->name('guncelle');
    Route::get('/guncellen/{egitimId?}', [EgitimController::class, 'guncellen'])->name('guncellen');
    Route::get('/deneyim', [deneyimController::class, 'deneyim'])->name('deneyim');
    Route::get('/deneyimEkle', [deneyimController::class, 'deneyimEkle'])->name('deneyimEkle');
    Route::post('/deneyimEklendi', [deneyimController::class, 'deneyimEklendi'])->name('deneyimEklendi');
    Route::post('/deneyimSil', [deneyimController::class, 'deneyimSil'])->name("deneyimSil");
    Route::get('/setupdate/{deneyimid?}', [deneyimController::class, 'setupdate'])->name('setupdate');
    Route::post('/getupdate', [deneyimcontroller::class, 'getupdate'])->name('getupdate');
    Route::get('/yetkinlik', [yetkinlikController::class, 'yetkinlik'])->name('yetkinlik');
    Route::get('/yetkinlikEkle', [yetkinlikController::class, 'yetkinlikEkle'])->name('yetkinlikEkle');
    Route::post('/yetkinlikEklendi', [yetkinlikController::class, 'yetkinlikEklendi'])->name('yetkinlikEklendi');
    Route::post('/yetkinlikSil', [yetkinlikController::class, 'yetkinlikSil'])->name("yetkinlikSil");
    Route::get('/yetkinlikGuncellen/{yetkinlikid?}', [yetkinlikController::class, 'yetkinlikGuncellen'])->name('yetkinlikGuncellen');
    Route::post('/yetkinlikGuncelle', [yetkinlikcontroller::class, 'yetkinlikGuncelle'])->name('yetkinlikGuncelle');
    Route::get('/hakkimda', [hakkimdaController::class, 'hakkimda'])->name('hakkimda');
    Route::get('/hakkimdaEkle', [hakkimdaController::class, 'hakkimdaEkle'])->name('hakkimdaEkle');
    Route::post('/hakkimdaEklendi', [hakkimdaController::class, 'hakkimdaEklendi'])->name('hakkimdaEklendi');
    Route::get('/iletisim', [iletisimController::class, 'iletisim'])->name('iletisim');
    Route::get('/iletisimEkle', [iletisimController::class, 'iletisimEkle'])->name('iletisimEkle');
    Route::post('/iletisimEklendi', [iletisimController::class, 'iletisimEklendi'])->name('iletisimEklendi');
    Route::post('/iletisimSil', [iletisimController::class, 'iletisimSil'])->name("iletisimSil");
    Route::get('/iletisimGuncellen/{iletisimid?}', [iletisimController::class, 'iletisimGuncellen'])->name('iletisimGuncellen');
    Route::post('/iletisimGuncelle', [iletisimcontroller::class, 'iletisimGuncelle'])->name('iletisimGuncelle');
    Route::get('/sosyalmedya', [sosyalmedyaController::class, 'sosyalmedya'])->name('sosyalmedya');
    Route::get('/sosyalmedyaEkle', [sosyalmedyaController::class, 'sosyalmedyaEkle'])->name('sosyalmedyaEkle');
    Route::post('/sosyalmedyaEklendi', [sosyalmedyaController::class, 'sosyalmedyaEklendi'])->name('sosyalmedyaEklendi');
    Route::post('/sosyalmedyaSil', [sosyalmedyaController::class, 'sosyalmedyaSil'])->name("sosyalmedyaSil");
    Route::get('/sosyalmedyaGuncellen/{medyaid?}', [sosyalmedyaController::class, 'sosyalmedyaGuncellen'])->name('sosyalmedyaGuncellen');
    Route::post('/sosyalmedyaGuncelle', [sosyalmedyacontroller::class, 'sosyalmedyaGuncelle'])->name('sosyalmedyaGuncelle');

});


