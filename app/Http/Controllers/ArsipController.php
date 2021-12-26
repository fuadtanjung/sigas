<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Arsip;
use App\Model\Bentuk;
use App\Model\Indeks;
use App\Model\Keterangan;
use App\Model\Tingkatperkembangan;

class ArsipController extends Controller
{
    public function index()
    {
        $arsip = Arsip::with('indeks')->get();
        $indeks = Indeks::all();
        $bentuk = Bentuk::all();
        $keterangan = Keterangan::all();
        $tingkat = Tingkatperkembangan::all();
        return view('arsip.index',compact('arsip','indeks','bentuk','keterangan','tingkat'));
    }

    public function store(Request $request)
    {
        $arsip = new Arsip();
        $arsip->indeks_id = $request->get('indeks_id');
        $arsip->tingkat_perkembangan_id = $request->get('tingkat_perkembangan_id');
        $arsip->bentuk_id = $request->get('bentuk_id');
        $arsip->keterangan_id = $request->get('keterangan_id');
        $arsip->deskripsi = $request->get('deskripsi');
        $arsip->tahun = $request->get('tahun');
        $arsip->jumlah = $request->get('jumlah');
        $arsip->rak = $request->get('rak');
        $arsip->roll_o_pack = $request->get('roll_o_pack');
        $arsip->boks = $request->get('boks');
        $arsip->bungkus = $request->get('bungkus');
        $arsip->buku = $request->get('buku');
        $arsip->sampul = $request->get('sampul');
        $arsip->save();

        return redirect()->route('arsip.index')->with('success','Arsip berhasil ditambahkan');
    }
}
