<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lokasi extends Model
{
    use HasFactory;
    protected $fillable = ['ID_Lokasi', 'Jenis_Lokasi', 'Nama_Lokasi', 'ID_Kota'];
    protected $table = 'lokasi';
    public $timestamps = false;
}
