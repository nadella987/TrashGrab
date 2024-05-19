<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JadwalPickup extends Model
{
    use HasFactory;
    protected $table='jadwal_pickup';
    protected $primarykey='id';
    protected $fillable = [
        'kode_jadwal',
        'tanggal',
        'id_driver',
        'id_area',
    ];

    public function Driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'id_driver');
    }

    public function Area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'id_area');
    }
}
