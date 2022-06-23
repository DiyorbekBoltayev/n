<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;

class TahlilController extends Controller
{
    public function index(){
        $ombor=Gudang::all();
        $tahlil1=[];
        foreach ($ombor as $a){
            $b=[];
            $b["nomi"]="$a->nama_gudang";
            $kirgan_soni=Inventory::all()->where('status','KIRITILDI')->where('id_gudang',$a->id_gudang)->sum('jumlah');
            $chiqgan_soni=Inventory::all()->where('status','CHIQARILDI')->where('id_gudang',$a->id_gudang)->sum('jumlah');
            $qoldiq=$kirgan_soni-$chiqgan_soni;
            $b['jami']=$qoldiq;
            $tanho=Inventory::where('id_gudang',$a->id_gudang)->distinct('id_produk')->count('id_produk');
            $b['tanho']=$tanho;
            $tahlil1[]=$b;
        }

        $tahlil2=[];
        $mahsulot=Product::all();
        foreach ($mahsulot as $m){


            foreach ($ombor as $o){
                $b=[];
                $b['nomi']=$m->nama_produk;
                $b['ombor']=$o->nama_gudang;
                $kirdi=Inventory::all()->where('status','KIRITILDI')
                    ->where('id_produk',$m->id_produk)
                    ->where('id_gudang',$o->id_gudang)->sum('jumlah');
                $chiqdi=Inventory::all()->where('status','CHIQARILDI')
                    ->where('id_produk',$m->id_produk)
                    ->where('id_gudang',$o->id_gudang)->sum('jumlah');
                $qoldi=$kirdi-$chiqdi;
                $b['soni']=$qoldi;
                $tahlil2[]=$b;

            }


        }
        $tt=[];
        foreach ($tahlil2 as $tahlil){
            if($tahlil['soni'] !=0){
                $tt[]=$tahlil;
            }
        }



        return view('tahlil.index',[
            'omborlar'=>$tahlil1,
            'mahsulotlar'=>$tt,

        ]);
    }
}
