<?php

namespace App\Http\Controllers;

use App\Model\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlah = Arsip::count();
        $bentuk = Arsip::select(DB::raw('bentuks.id, bentuks.nama_bentuk, COUNT(*) AS count'))
                    ->join('bentuks', 'bentuks.id', '=', 'arsips.bentuk_id')
                    ->groupBy('bentuks.id','bentuks.nama_bentuk')
                    ->get();
        $tingkatperkembangan = Arsip::select(DB::raw('tingkatperkembangans.id, tingkatperkembangans.nama_tingkat_perkembangan, COUNT(*) AS count'))
                    ->join('tingkatperkembangans', 'tingkatperkembangans.id', '=', 'arsips.tingkat_perkembangan_id')
                    ->groupBy('tingkatperkembangans.id','tingkatperkembangans.nama_tingkat_perkembangan')
                    ->get();
        $keterangan = Arsip::select(DB::raw('keterangans.id, keterangans.nama_keterangan, COUNT(*) AS count'))
                    ->join('keterangans', 'keterangans.id', '=', 'arsips.keterangan_id')
                    ->groupBy('keterangans.id','keterangans.nama_keterangan')
                    ->get();
        return view('home',compact('jumlah','bentuk','tingkatperkembangan','keterangan'));
    }
}
