<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory, HasUuids;

     protected $fillable = ['kode','tanggal', 'kunjungan_id', 'obat_id'];
     

    public function kunjungan(){
        return $this->belongsTo(Kunjungan::class, 'kunjungan_id', 'id');
    }

    public function obat()
    {
        return $this->belongsToMany(Obat::class, 'rekam_medis_obats', 'rekam_medis_id', 'obat_id');
    }

}
