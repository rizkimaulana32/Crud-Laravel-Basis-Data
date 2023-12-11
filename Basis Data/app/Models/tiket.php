<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiket extends Model
{
    use HasFactory;
    protected $fillable = ['ID_Tiket', 'Harga', 'Jadwal_Berangkat', 'Tgl_Beli', 'ID_Transport', 'ID_Trip', 'ID_User'];
    protected $table = 'tiket';
    public $timestamps = false;
}
