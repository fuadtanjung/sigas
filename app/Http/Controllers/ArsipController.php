<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Arsip;
use App\Model\Bentuk;
use App\Model\Keterangan;
use App\Model\Tingkatperkembangan;
use DataTables;
use App\Exports\ArsipExport;
use Maatwebsite\Excel\Facades\Excel;

class ArsipController extends Controller
{
    public function index()
    {
        $arsip = Arsip::with(['bentuk','keterangan','tingkatperkembangan'])->get();
        $bentuk = Bentuk::all();
        $keterangan = Keterangan::all();
        $tingkat = Tingkatperkembangan::all();
        return view('arsip.index',compact('arsip','bentuk','keterangan','tingkat'));
    }

    public function ajaxTable(){
        // $arsip = Arsip::join('tingkatperkembangans','arsips.tingkat_perkembangan_id','=','tingkatperkembangans.id')
        // ->join('keterangans','arsips.keterangan_id','=','keterangans.id')
        // ->join('bentuks','arsips.bentuk_id','=','bentuks.id')
        // ->select('arsips.*','keterangans.nama_keterangan','bentuks.nama_bentuk','tingkatperkembangans.nama_tingkat_perkembangan')
        // ->get();
        $arsip = Arsip::with(['bentuk','keterangan','tingkatperkembangan'])->get();
        return Datatables::of($arsip)->make(true);
    }


    public function store(Request $request)
    {
        $arsip = new Arsip();
        $arsip->indeks = $request->get('indeks');
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

        return redirect()->route('arsip.index')->with('success','Data arsip berhasil ditambahkan');
    }

     public function edit($id, Request $request){
        $arsip = Arsip::where('id', $id)->first();
        $arsip->indeks = $request->get('indeks');
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
        if($arsip->update()){
             return redirect()->route('arsip.index')->with('success','Data arsip berhasil diubah');
        }else{
            return redirect()->route('arsip.index')->with('error',"Gagal merubah data arsip");
        }
    }

    public function delete($id)
    {
        $goldar = Arsip::where('id', $id)->first();
        if ($goldar->delete()) {
            return json_encode(array("success" => "Berhasil menghapus data arsip"));
        } else {
           return json_encode(array("error" => "Gagal menghapus data arsip"));
        }
    }

     public function export()
    {
        return Excel::download(new ArsipExport, 'arsip.xlsx');
    }
}
