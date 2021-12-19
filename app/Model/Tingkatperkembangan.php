<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tingkatperkembangan extends Model
{
    protected $table="tingkatperkembangans";
    protected $primaryKey="id";
    protected $fillable=['nama_tingkat_perkembangan'];
}
