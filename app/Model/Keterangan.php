<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    protected $table="keterangans";
    protected $primaryKey="id";
    protected $fillable=['nama_keterangan'];

      public function arsip(){
        return $this->hasOne(Arsip::class);
    }
}
