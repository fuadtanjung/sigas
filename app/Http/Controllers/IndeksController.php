<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Indeks;

class IndeksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indeks = Indeks::latest()->get();
        return view('pengaturan.indeks.index',compact('indeks'));
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
        $validate = $request->validate(['nama_indeks' => 'required']);
        Indeks::create($validate);
        return redirect()->route('indeks.index')->with('success','Indeks Arsip berhasil ditambahkan');
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
        Indeks::whereId($id)->update([
           'nama_indeks' => $request->edit_nama_indeks
        ]);

         return redirect()->route('indeks.index')->with('update', 'Indeks Arsip berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Indeks::findOrFail($id);
        $delete->delete();

        return redirect()->route('indeks.index')->with('delete', 'Indeks Arsip berhasil dihapus');
    }
}
