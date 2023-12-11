<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trip extends Model
{
    use HasFactory;
    protected $fillable = ['ID_Trip', 'Nama_Trip', 'Jenis_Trip', 'ID_User'];
    protected $table = 'trip';
    public $timestamps = false;
}

