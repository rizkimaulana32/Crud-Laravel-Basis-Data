<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;
    protected $fillable = ['ID_User', 'Nama_User', 'Sex', 'Email', 'ID_Kota'];
    protected $table = 'user';
    public $timestamps = false;
}
