<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $table='driver';
    protected $primarykey='id';
   protected $fillable = [
       'nama_pegawai',
       'email',
       'jenis_kelamin',
       'no_telp',
       'alamat',
   ];
}
