<?php

namespace App\Http\Controllers;

use App\Model\Bentuk;
use App\Model\Keterangan;
use Illuminate\Http\Request;
use App\Model\Tingkatperkembangan;

class ListController extends Controller
{
     public function listTingkat(){
        $tingkat = Tingkatperkembangan::all();
        return json_encode($tingkat);
    }

     public function listBentuk(){
        $bentuk = Bentuk::all();
        return json_encode($bentuk);
    }

     public function listKeterangan(){
        $keterangan = Keterangan::all();
        return json_encode($keterangan);
    }

}
