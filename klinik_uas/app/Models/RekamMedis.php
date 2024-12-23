<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [ 'id'];

    public function kunjungan(){
        return $this->belongsTo(Kunjungan::class, 'kunjungan_id', 'id');
    }

    public function obat(){
        return $this->belongsTo(Obat::class, 'obat_id', 'id');
    }
}
