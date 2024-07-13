<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'Pegawai';
    protected $primaryKey = 'id';
    protected $fillable = ['id','NIK','nama_pegawai','asal_kota','jenis_kelamin'];
}
