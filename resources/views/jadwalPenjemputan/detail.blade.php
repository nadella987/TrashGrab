@extends('layout.master')
@section('title', 'Detail Jadwal Penjemputan')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="card-title text-dark mb-0"><strong>Detail Jadwal Penjemputan</strong> </h2>
                    </div>
                    <div class="row">
                        <div class="col"> 
                            <strong>Kode Jadwal</strong>
                            <p>{{ $jadwalPenjemputan->kode_jadwal }}</p>
                        </div>
                        <div class="col">
                            <strong>Tanggal</strong>
                            <p>{{ \Carbon\Carbon::parse($jadwalPenjemputan->tanggal)->translatedFormat('d F Y') }}</p>
                        </div>
                        <div class="w-100"></div>
                        <div class="col">
                        <strong>Nama Driver</strong>
                        <p>{{$jadwalPenjemputan->Driver->nama_pegawai}}</p>
                        </div>
                        <div class="col">
                            <strong>Nama Area</strong>
                            <p>{{ $jadwalPenjemputan->Area->lokasi }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

