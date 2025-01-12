<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory, HasUuids;

        protected $fillable = ['kode','nama', 'jumlah'];

    public function rekamMedis()
    {
        return $this->belongsToMany(RekamMedis::class, 'rekam_medis_obats', 'obat_id', 'rekam_medis_id');
    }

}
