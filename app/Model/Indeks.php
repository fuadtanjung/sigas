<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Indeks extends Model
{
  protected $table="indeks";
  protected $primaryKey="id";
  protected $fillable=['nama_indeks'];

    public function arsip(){
        return $this->hasOne(Arsip::class);
    }
}
