<?php

namespace App\Http\Controllers;

use App\Model\Arsip;
use Illuminate\Http\Request;
use App\Model\Bentuk;

class BentukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bentuk = Bentuk::latest()->get();
        return view('pengaturan.bentuk.index',compact('bentuk'));
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
        $validate = $request->validate(['nama_bentuk' => 'required']);
        Bentuk::create($validate);
        return redirect()->route('bentuks.index')->with('success','Bentuk Arsip berhasil ditambahkan');
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
        Bentuk::whereId($id)->update([
           'nama_bentuk' => $request->edit_nama_bentuk
        ]);

        return redirect()->route('bentuks.index')->with('success', 'Bentuk Arsip berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Arsip::where('bentuk_id',$id)->count() === 0){
            $delete = Bentuk::findOrFail($id);
            $delete->delete();
            return redirect()->route('bentuks.index')->with('success', 'Bentuk Arsip berhasil dihapus');
        }
        else
        {
        return redirect()->route('bentuks.index')->with('error', 'Gagal Bentuk Arsip dipakai dalam data Arsip!');
        }
    }
}
