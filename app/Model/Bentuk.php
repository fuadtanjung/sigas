<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bentuk extends Model
{
    protected $table="bentuks";
    protected $primaryKey="id";
    protected $fillable=['nama_bentuk'];

    public function arsip(){
        return $this->hasOne(Arsip::class);
    }
}
    