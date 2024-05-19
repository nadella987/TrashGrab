<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KatalogSampah extends Model
{
    use HasFactory;
    protected $table='katalog_sampah';
    protected $primarykey='id';
    protected $fillable = [
        'jenis_sampah',
        'foto',
        'harga',
    ];
}
