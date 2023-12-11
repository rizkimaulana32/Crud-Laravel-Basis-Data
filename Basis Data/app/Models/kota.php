<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    use HasFactory;
    protected $fillable = ['ID_Kota', 'Nama_Kota'];
    protected $table = 'kota';
    public $timestamps = false;
}
