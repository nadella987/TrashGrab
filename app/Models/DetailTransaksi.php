<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_transaksi',
        'id_sampah',
        'qty',
        'total'
  
    ];

    public function Transaksi(): BelongsTo
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }
    public function Sampah(): BelongsTo
    {
        return $this->belongsTo(KatalogSampah::class, 'id_sampah');
    }
}
