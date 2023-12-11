<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transportasi_publik extends Model
{
    use HasFactory;
    protected $fillable = ['ID_Transport', 'Nama_Transport', 'Transport_Company'];
    protected $table = 'transportasi_publik';
    public $timestamps = false;
}
