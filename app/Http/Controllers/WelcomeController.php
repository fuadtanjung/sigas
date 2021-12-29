<?php

namespace App\Http\Controllers;

use App\Model\Arsip;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
     public function index(Request $request)
    {

        $cari = $request->input('search');

        if (empty($cari)) {

            return view('welcome.welcomes');
        }else{
            $search = Arsip::with(['bentuk','tingkatperkembangan','keterangan'])
            ->where('indeks','like',"%$cari%")
            ->orWhere('deskripsi','like',"%$cari%")
            ->get();

            return view('welcome.welcome',compact('search'));
        }
    }
}
