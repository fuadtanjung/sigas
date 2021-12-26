<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Keterangan;

class KeteranganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keterangan = Keterangan::latest()->get();
        return view('pengaturan.keterangan.index',compact('keterangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate(['nama_keterangan' => 'required']);
        Keterangan::create($validate);
        return redirect()->route('keterangans.index')->with('success','Keterangan Arsip berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          Keterangan::whereId($id)->update([
           'nama_keterangan' => $request->edit_nama_keterangan
        ]);

         return redirect()->route('keterangans.index')->with('update', 'Keterangan Arsip berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Keterangan::findOrFail($id);
        $delete->delete();

        return redirect()->route('keterangans.index')->with('delete', 'Keterangan Arsip berhasil dihapus');
    }
}
