<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $table="arsips";
    protected $primaryKey="id";
    protected $fillable=[
        'indeks_id,
        bentuk_id,
        tingkat_perkembangan_id,
        keterangan_id,
        deskripsi,
        tahun,
        jumlah,
        rak,
        roll_o_pack,
        boks,
        bungkus,
        buku,
        sampul'];

    public function indeks(){
        return $this->belongsTo(Indeks::class,'indeks_id','id');
    }
    public function tingkatperkembangan(){
        return $this->belongsTo(Tingkatperkembangan::class,'tingkat_perkembangan_id','id');
    }
    public function bentuk(){
        return $this->belongsTo(Bentuk::class,'bentuk_id','id');
    }
    public function keterangan(){
        return $this->belongsTo(Keterangan::class,'keterangan_id','id');
    }
}
