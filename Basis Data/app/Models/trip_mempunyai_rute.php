<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trip_mempunyai_rute extends Model
{
    use HasFactory;
    protected $fillable = ['ID_Trip', 'ID_Rute'];
    protected $table = 'trip_mempunyai_rute';
    public $timestamps = false;
}
