@extends('layout.master')
@section('title', 'Detail Katalog Sampah')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="card-title text-dark mb-0"><strong>Detail Sampah</strong> </h2>
                    </div>
                    <div class="row">
                        <div class="col"> 
                        <img  src="{{ asset('storage/foto/' . basename($katalogSampah->foto)) }}" style="width: 200px; height: 200px;">
                        </div>
                        <div class="col">
                        <strong>Kode Jadwal</strong>
                            <p>{{ $katalogSampah->jenis_sampah }}</p>
                            <strong>Tanggal</strong>
                            <p>{{ $katalogSampah->harga }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

