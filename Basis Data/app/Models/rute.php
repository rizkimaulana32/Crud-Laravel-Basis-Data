<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rute extends Model
{
    use HasFactory;
    protected $fillable = ['ID_Rute', 'Nama_Rute', 'Waktu_Tiba', 'Waktu_Berangkat', 'ID_Transport', 'IDLokasi_berangkat_ke', 'IDLokasi_berangkat_dari'];
    protected $table = 'rute';
    public $timestamps = false;
}
