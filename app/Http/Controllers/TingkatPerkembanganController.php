<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Tingkatperkembangan;

class TingkatPerkembanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tkt_perkembangan = Tingkatperkembangan::orderBy('created_at', 'desc')->paginate(10);
        return view('pengaturan.tingkat_perkembangan.index',compact('tkt_perkembangan'));
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
        $validate = $request->validate(['nama_tingkat_perkembangan' => 'required']);
        Tingkatperkembangan::create($validate);
        return redirect()->route('tingkat_perkembangans.index')->with('success','Tingkat Perkembangan Arsip berhasil ditambahkan');
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
        Tingkatperkembangan::whereId($id)->update([
           'nama_tingkat_perkembangan' => $request->edit_nama_tkt_perkembangan
        ]);

         return redirect()->route('tingkat_perkembangans.index')->with('update', 'Tingkat Perkembangan Arsip berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = TingkatPerkembangan::findOrFail($id);
        $delete->delete();

        return redirect()->route('tingkat_perkembangans.index')->with('delete', 'Tingkat Perkembangan Arsip berhasil dihapus');
    }
}
