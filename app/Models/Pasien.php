<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory, HasUuids;

     protected $fillable = ['nama','tanggal_lahir', 'jenis_kelamin', 'alamat', 'no_telp'];
}
