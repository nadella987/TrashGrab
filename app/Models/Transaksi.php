<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaksi extends Model
{
    use HasFactory;
    protected $table='transaksi';
    protected $primarykey='id';
    protected $fillable = [
        'id_user',
        'id_jadwal',
        'tanggal_transaksi',
        'alamat_jemput',
        'status'
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function JadwalPickup(): BelongsTo
    {
        return $this->belongsTo(JadwalPickup::class, 'id_jadwal');
    }
    public function detailTransaksi(): HasMany
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi');
    }
}
