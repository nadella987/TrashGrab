<?php

use App\Models\Area;
use App\Models\Driver;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_pickup', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jadwal');
            $table->date('tanggal');
            $table->foreignIdFor(Driver::class,'id_driver');
            $table->foreignIdFor(Area::class,'id_area');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_penjemputan');
    }
};
