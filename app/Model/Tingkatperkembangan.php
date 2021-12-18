<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tingkatperkembangan extends Model
{
    protected $table="tingkat_perkembangans";
    protected $primaryKey="id";
    protected $fillable=['nama_tingkat_perkembangan'];
}
